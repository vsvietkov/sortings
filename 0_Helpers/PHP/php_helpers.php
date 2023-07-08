<?php

function swapArrayElements(array &$input, int $i, int $j) {
    // Destructuring allows direct assignment of values without the need of additional temporary variables
    [ $input[$i], $input[$j] ] = [ $input[$j], $input[$i] ];
}

function printArray(array $input) {
    $inputLastIndex = count($input) - 1;
    echo '[';

    for ($i = 0; $i <= $inputLastIndex; ++$i) {
        echo $input[$i];
        echo $i === $inputLastIndex ? ']' : ', ';
    }
}
