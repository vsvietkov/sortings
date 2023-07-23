<?php

include_once __DIR__ . '/../../0_Helpers/PHP/php_helpers.php';

function mergeSort(SplFixedArray|array &$input, int $startIndex, int $endIndex)
{
    if ($startIndex >= $endIndex) {
        return;
    }
    $middleIndex = ($startIndex + $endIndex) / 2;

    mergeSort($input, $startIndex, $middleIndex);
    mergeSort($input, $middleIndex + 1, $endIndex);
    merge($input, $startIndex, $middleIndex, $endIndex);
}

function merge(SplFixedArray|array &$input, int $startIndex, int $middleIndex, int $endIndex)
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

foreach(ARRAY_SIZES_FOR_TESTING as $size) {
    echo "=====\nNumber of elements: $size\n";
    $input = getArrayOfElements($size);

    echo "\nNot sorted input: ";
    printArray($input);
    echo "\n\n";

    iterativeSortingExecutionWrapper('mergeSort', $input, 0, $size - 1);

    echo "\nSorted input: ";
    printArray($input);
    echo "\n\n";
}
