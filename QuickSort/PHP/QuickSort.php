<?php namespace QuickSort;

use Helpers\SortingAlgorithm;

class QuickSort extends SortingAlgorithm
{
    public function run(): void
    {
        $this->_quickSort($this->_input, 0, count($this->_input) - 1);
    }

    private function _quickSort(SplFixedArray|array &$input, int $startIndex, int $endIndex): void
    {
        if ($startIndex >= $endIndex) {
            return;
        }
        $j = $startIndex;
        $i = $j - 1;
        $pivot = $input[$endIndex];

        while ($j < $endIndex) {
            if ($input[$j] < $pivot) {
                swapArrayElements($input, ++$i, $j);
            }
            ++$j;
        }
        swapArrayElements($input, ++$i, $endIndex);

        $this->_quickSort($input, $startIndex, $i - 1);
        $this->_quickSort($input, $i + 1, $endIndex);
    }
}
