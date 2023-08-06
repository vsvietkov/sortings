<?php namespace InsertionSort;

use Helpers\SortingAlgorithm;

class InsertionSort extends SortingAlgorithm
{
    public function run(): void
    {
        $this->_insertionSort($this->_input);
    }

    private function _insertionSort(SplFixedArray|array &$input)
    {
        $inputLastIndex = count($input) - 1;
    
        for ($i = 0; $i < $inputLastIndex; ++$i) {
            if ($input[$i] > $input[$i + 1]) {
                swapArrayElements($input, $i, $i + 1);
                $this->_sortLeftPart($input, $i);
            }
        }
    }

    private function _sortLeftPart(SplFixedArray|array &$input, int $i)
    {
        for ($j = $i; $j > 0; --$j) {
            if ($input[$j] < $input[$j - 1]) {
                swapArrayElements($input, $j, $j - 1);
            } else {
                break;
            }
        }
    }
}
