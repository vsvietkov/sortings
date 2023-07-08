<?php

const ARRAY_SIZES_FOR_TESTING = [10, 20, 1000, 10000];

// Print the usage of memory and time execution after the callback
function sortingExecutionWrapper(callable $callback, SplFixedArray|array &$callbackArgument)
{
    $startTime = hrtime(true);
    $startMemory = memory_get_usage();

    $callback($callbackArgument);

    echo 'Memory used for execution: ' . (memory_get_usage() - $startMemory) . ' bytes' . PHP_EOL;
    echo 'Time spent for execution: ' . (hrtime(true) - $startTime) / 1e6 . ' milliseconds' . PHP_EOL;
}

function getArrayOfElements(int $size): array
{
    // $array = new SplFixedArray($size); // Uses less memory but increases execution time
    $array = [];

    for ($i = 0; $i < $size; ++$i) {
        $array[$i] = random_int(-10000, 10000);
    }
    return $array;
}

function swapArrayElements(SplFixedArray|array &$input, int $i, int $j)
{
    // Destructuring allows direct assignment of values without the need of additional temporary variables
    [ $input[$i], $input[$j] ] = [ $input[$j], $input[$i] ];
}

function printArray(SplFixedArray|array $input)
{
    $inputLastIndex = count($input) - 1;
    echo '[';

    for ($i = 0; $i <= $inputLastIndex; ++$i) {
        if ($i > 20) {
            echo '...]';
            break;
        }
        echo $input[$i];
        echo $i === $inputLastIndex ? ']' : ', ';
    }
}
