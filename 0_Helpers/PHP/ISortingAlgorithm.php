<?php namespace Helpers;

interface ISortingAlgorithm
{
    public function validate(): bool;
    public function run(): void;
}
