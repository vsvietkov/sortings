<?php

$input = [10, 5, 12, 4, 2, -7, 0];

function printArray(array $input) {
    $inputLastIndex = count($input) - 1;
    echo '[';

    for ($i = 0; $i <= $inputLastIndex; ++$i) {
        echo $input[$i];
        echo $i === $inputLastIndex ? ']' : ', ';
    }
}

function swapArrayElements(array &$input, int $i, int $j) {
    // Destructuring allows direct assignment of values without the need of additional temporary variables
    [ $input[$i], $input[$j] ] = [ $input[$j], $input[$i] ];
}

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
