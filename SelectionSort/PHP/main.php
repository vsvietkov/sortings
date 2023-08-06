<?php require_once __DIR__ . '/../../vendor/autoload.php';

include_once __DIR__ . '/../../0_Helpers/PHP/php_helpers.php';

function selectionSort(SplFixedArray|array &$input)
{
    $inputLastIndex = count($input) - 1;

    for ($i = 0; $i < $inputLastIndex; ++$i) {
        $minValueIndex = $i;

        for ($j = $i + 1; $j <= $inputLastIndex; ++$j) {
            if ($input[$j] < $input[$minValueIndex]) {
                $minValueIndex = $j;
            }
        }

        if ($i < $minValueIndex) {
            swapArrayElements($input, $i, $minValueIndex);
        }
    }
}

foreach(ARRAY_SIZES_FOR_TESTING as $size) {
    echo "=====\nNumber of elements: $size\n";
    $input = getArrayOfElements($size);

    echo "\nNot sorted input: ";
    printArray($input);
    echo "\n\n";

    iterativeSortingExecutionWrapper('selectionSort', $input);

    echo "\nSorted input: ";
    printArray($input);
    echo "\n\n";
}
