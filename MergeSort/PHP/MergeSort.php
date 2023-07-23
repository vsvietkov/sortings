<?php

include_once __DIR__ . '/../../0_Helpers/PHP/SortingAlgorithm.php';

class MergeSort extends SortingAlgorithm
{
    public function run(): void
    {
        $this->_mergeSort($this->_input, 0, count($this->_input) - 1);
    }

    private function _mergeSort(SplFixedArray|array &$input, int $startIndex, int $endIndex): void
    {
        if ($startIndex >= $endIndex) {
            return;
        }
        $middleIndex = ($startIndex + $endIndex) / 2;

        self::_mergeSort($input, $startIndex, $middleIndex);
        self::_mergeSort($input, $middleIndex + 1, $endIndex);
        self::_merge($input, $startIndex, $middleIndex, $endIndex);
    }

    private function _merge(SplFixedArray|array &$input, int $startIndex, int $middleIndex, int $endIndex): void
    {
        // Fill in the temporary arrays
        $leftArray = [];
        $rightArray = [];

        for ($i = $startIndex; $i <= $endIndex; ++$i) {
            if ($i > $middleIndex) {
                $rightArray[] = $input[$i];
            } else {
                $leftArray[] = $input[$i];
            }
        }
        $leftArrayLength = count($leftArray); // can be replaced with ($middleIndex - $startIndex + 1) but for this case I'd prefer count() for readability
        $rightArrayLength =  count($rightArray); // same as above

        // Merge temp arrays in the initial array
        $i = 0;
        $j = 0;
        $k = $startIndex;

        while ($i < $leftArrayLength && $j < $rightArrayLength) {
            if ($leftArray[$i] <= $rightArray[$j]) {
                $input[$k++] = $leftArray[$i++];
            } else {
                $input[$k++] = $rightArray[$j++];
            }
        }

        while ($i < $leftArrayLength) {
            // Fill in elements that left in left array
            $input[$k++] = $leftArray[$i++];
        }

        while ($j < $rightArrayLength) {
            // Fill in elements that left in right array
            $input[$k++] = $rightArray[$j++];
        }
    }
}
