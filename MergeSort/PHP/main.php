<?php require_once __DIR__ . '/../../vendor/autoload.php';

include_once __DIR__ . '/../../0_Helpers/PHP/php_helpers.php';

use Helpers\Decorators\ExecutionStatisticDecorator;
use MergeSort\MergeSort;

foreach(ARRAY_SIZES_FOR_TESTING as $size) {
    echo "=====\nNumber of elements: $size\n";
    $input = getArrayOfElements($size);

    echo "\nNot sorted input: ";
    printArray($input);
    echo "\n\n";

    $mergeSort = new MergeSort($input);
    $decorator = new ExecutionStatisticDecorator($mergeSort);
    $decorator->run();

    echo "\nSorted input (" . ($decorator->validate() ? 'true' : 'false') . '): ';
    printArray($input);
    echo "\n\n";
}
