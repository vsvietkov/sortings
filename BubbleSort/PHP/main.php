<?php

include_once __DIR__ . '/../../0_Helpers/PHP/php_helpers.php';

function iterativeBubbleSort(SplFixedArray|array &$input)
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

function recursiveBubbleSort(SplFixedArray|array &$input, int $lastIndex)
{
    if ($lastIndex === 0) {
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
    recursiveBubbleSort($input, $lastIndex - 1);
}

foreach(ARRAY_SIZES_FOR_TESTING as $size) {
    echo "=====\nNumber of elements: $size\n";
    $input = getArrayOfElements($size);

    echo "\nNot sorted input: ";
    printArray($input);
    echo "\n\n";

    iterativeSortingExecutionWrapper('iterativeBubbleSort', $input);
    // recursiveSortingExecutionWrapper('recursiveBubbleSort', $input, count($input) - 1);

    echo "\nSorted input: ";
    printArray($input);
    echo "\n\n";
}
