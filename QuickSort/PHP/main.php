<?php

include_once __DIR__ . '/../../0_Helpers/PHP/php_helpers.php';
include_once __DIR__ . '/QuickSort.php';

foreach(ARRAY_SIZES_FOR_TESTING as $size) {
    echo "=====\nNumber of elements: $size\n";
    $input = getArrayOfElements($size);

    echo "\nNot sorted input: ";
    printArray($input);
    echo "\n\n";

    $quickSort = new QuickSort($input);
    sortingExecutionWrapper($quickSort);

    echo "\nSorted input (" . ($quickSort->validate() ? 'true' : 'false') . '): ';
    printArray($input);
    echo "\n\n";
}
