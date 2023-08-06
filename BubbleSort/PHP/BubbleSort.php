<?php namespace BubbleSort;

use Helpers\SortingAlgorithm;

class BubbleSort extends SortingAlgorithm
{
    public function run(): void
    {
        $this->_bubbleSort($this->_input);
    }

    private function _bubbleSort(SplFixedArray|array &$input)
    {
        $inputLastIndex = count($input) - 1;

        for ($i = 0; $i < $inputLastIndex; ++$i) {
            $swapped = false;

            for ($j = 0; $j < $inputLastIndex - $i; ++$j) {
                if ($input[$j] > $input[$j + 1]) {
                    swapArrayElements($input, $j, $j + 1);
                    $swapped = true;
                }
            }

            if (!$swapped) {
                break;
            }
        }
    }
}
