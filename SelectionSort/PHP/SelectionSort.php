<?php namespace SelectionSort;

use Helpers\SortingAlgorithm;

class SelectionSort extends SortingAlgorithm
{
    public function run(): void
    {
        $this->_selectionSort($this->_input);
    }

    private function _selectionSort(SplFixedArray|array &$input)
    {
        $inputLastIndex = count($input) - 1;
    
        for ($i = 0; $i < $inputLastIndex; ++$i) {
            $minValueIndex = $i;
    
            for ($j = $i + 1; $j <= $inputLastIndex; ++$j) {
                if ($input[$j] < $input[$minValueIndex]) {
                    $minValueIndex = $j;
                }
            }
    
            if ($i < $minValueIndex) {
                swapArrayElements($input, $i, $minValueIndex);
            }
        }
    }
}
