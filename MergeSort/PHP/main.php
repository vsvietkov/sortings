<?php

include_once __DIR__ . '/../../0_Helpers/PHP/php_helpers.php';
include_once __DIR__ . '/MergeSort.php';

foreach(ARRAY_SIZES_FOR_TESTING as $size) {
    echo "=====\nNumber of elements: $size\n";
    $input = getArrayOfElements($size);

    echo "\nNot sorted input: ";
    printArray($input);
    echo "\n\n";

    // iterativeSortingExecutionWrapper('mergeSort', $input, 0, $size - 1);
    $mergeSort = new MergeSort($input);
    sortingExecutionWrapper($mergeSort);

    echo "\nSorted input (" . ($mergeSort->validate() ? 'true' : 'false') . '): ';
    printArray($input);
    echo "\n\n";
}
