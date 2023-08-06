<?php namespace Helpers\Decorators;

use Helpers\ISortingAlgorithm;

class ExecutionStatisticDecorator implements ISortingAlgorithm
{
    protected ISortingAlgorithm $_component;

    public function __construct(ISortingAlgorithm $component) {
        $this->_component = $component;
    }

    public function run(): void
    {
        $startTime = hrtime(true);
        $startMemory = memory_get_usage();

        $this->_component->run();

        echo 'Memory used for execution: ' . (memory_get_usage() - $startMemory) . ' bytes' . PHP_EOL;
        echo 'Time spent for execution: ' . (hrtime(true) - $startTime) / 1e6 . ' milliseconds' . PHP_EOL;
    }

    public function validate(): bool
    {
        return $this->_component->validate();
    }
}
