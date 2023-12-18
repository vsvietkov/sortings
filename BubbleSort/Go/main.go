package main

import (
	"fmt"
	"math/rand"
	helpers "sortings/0_Helpers/Go"
	. "sortings/0_Helpers/Go/Decorators"
	. "sortings/0_Helpers/Go/SortingAlgorithm"
	. "sortings/BubbleSort/Go/BubbleSort"
)

func main() {
	inputSizes := []int{10, 19, 1000, 10000}
	for i := range inputSizes {
		fmt.Printf("=====\nNumber of elements: %d\n", inputSizes[i])
		input := rand.Perm(inputSizes[i])
		fmt.Printf("\nNot sorted input: ")
		helpers.PrintArray(input)

		var bubbleSort ISortingAlgorithm = BubbleSort{Input: input}
		var decorator ISortingAlgorithm = ExecutionStatisticsDecorator{Component: bubbleSort}
		decorator.Run()

		fmt.Printf("\nSorted input: ")
		helpers.PrintArray(input)
		fmt.Print("\n")
	}
}
