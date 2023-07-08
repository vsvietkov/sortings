<?php

include_once '../../0_Helpers/PHP/php_helpers.php';

$input = [10, 5, 12, 4, 2, -7, 0];

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

echo 'Not sorted input: ';
printArray($input);
echo PHP_EOL;

bubbleSort($input);

echo 'Sorted input: ';
printArray($input);
echo PHP_EOL;
