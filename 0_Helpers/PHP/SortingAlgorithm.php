<?php

abstract class SortingAlgorithm
{
    protected SplFixedArray|array $_input;

    public function __construct(SplFixedArray|array &$input) {
        $this->_input = &$input;
    }

    public function validate(): bool
    {
        $inputLength = count($this->_input);

        for ($i = 1; $i < $inputLength; ++$i) {
            if ($this->_input[$i - 1] > $this->_input[$i]) {
                return false;
            }
        }
        return true;
    }

    abstract public function run(): void;
}
