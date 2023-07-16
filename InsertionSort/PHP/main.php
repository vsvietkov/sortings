<?php

include_once __DIR__ . '/../../0_Helpers/PHP/php_helpers.php';

function insertionSort(SplFixedArray|array &$input)
{
    $inputLastIndex = count($input) - 1;

    for ($i = 0; $i < $inputLastIndex; ++$i) {
        if ($input[$i] > $input[$i + 1]) {
            swapArrayElements($input, $i, $i + 1);
            sortLeftPart($input, $i);
        }
    }
}

function sortLeftPart(SplFixedArray|array &$input, int $i)
{
    for ($j = $i; $j > 0; --$j) {
        if ($input[$j] < $input[$j - 1]) {
            swapArrayElements($input, $j, $j - 1);
        } else {
            break;
        }
    }
}

foreach(ARRAY_SIZES_FOR_TESTING as $size) {
    echo "=====\nNumber of elements: $size\n";
    $input = getArrayOfElements($size);

    echo "\nNot sorted input: ";
    printArray($input);
    echo "\n\n";

    iterativeSortingExecutionWrapper('insertionSort', $input);

    echo "\nSorted input: ";
    printArray($input);
    echo "\n\n";
}
