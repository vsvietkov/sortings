<?php

include_once '../../0_Helpers/PHP/php_helpers.php';

function bubbleSort(array &$input) {
    $inputLastIndex = count($input) - 1;

    for ($i = 0; $i < $inputLastIndex; ++$i) {
        for ($j = $i + 1; $j <= $inputLastIndex; ++$j) {
            if ($input[$i] > $input[$j]) {
                swapArrayElements($input, $i, $j);
            }
        }
    }
}

foreach(ARRAY_SIZES_FOR_TESTING as $size) {
    echo "=====\nNumber of elements: $size\n\n";
    $input = getArrayOfElements($size);

    echo 'Not sorted input: ';
    printArray($input);
    echo "\n\n";

    sortingExecutionWrapper('bubbleSort', $input);

    echo "\nSorted input: ";
    printArray($input);
    echo "\n\n";
}
