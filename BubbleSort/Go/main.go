package main

import (
	"fmt"
	"math/rand"
	helpers "sortings/0_Helpers/Go"
	"time"
)

func BubbleSort(input []int) {
	lastIndex := len(input) - 1

	for i := 0; i < lastIndex; i++ {
		swapped := false

		for j := 0; j < lastIndex-i; j++ {
			if input[j] > input[j+1] {
				input[j], input[j+1] = input[j+1], input[j]
				swapped = true
			}
		}

		if !swapped {
			break
		}
	}
}

func main() {
	inputSizes := []int{10, 19, 1000, 10000}
	for i := range inputSizes {
		startTime := time.Now()

		fmt.Printf("=====\nNumber of elements: %d\n", inputSizes[i])
		input := rand.Perm(inputSizes[i])
		fmt.Printf("\nNot sorted input: ")
		helpers.PrintArray(input)

		BubbleSort(input)

		fmt.Printf("\nSorted input: ")
		helpers.PrintArray(input)

		fmt.Printf("\n\nTime spent: %d milliseconds\n", time.Since(startTime).Milliseconds())
	}
}
