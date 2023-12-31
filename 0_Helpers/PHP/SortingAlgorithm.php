<?php namespace Helpers;

use Helpers\ISortingAlgorithm;

abstract class SortingAlgorithm implements ISortingAlgorithm
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
}
