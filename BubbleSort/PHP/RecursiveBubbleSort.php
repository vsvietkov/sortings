<?php namespace BubbleSort;

use Helpers\SortingAlgorithm;

class RecursiveBubbleSort extends SortingAlgorithm
{
    public function run(): void
    {
        $this->_recursiveBubbleSort($this->_input, count($this->_input) - 1);
    }

    private function _recursiveBubbleSort(SplFixedArray|array &$input, int $lastIndex)
    {
        if ($lastIndex === 0) {
            // Only one element left
            return;
        }
        $swapped = false;

        for ($i = 0; $i < $lastIndex; ++$i) {
            if ($input[$i] > $input[$i + 1]) {
                swapArrayElements($input, $i, $i + 1);
                $swapped = true;
            }
        }

        if (!$swapped) {
            return;
        }
        $this->_recursiveBubbleSort($input, $lastIndex - 1);
    }
}
