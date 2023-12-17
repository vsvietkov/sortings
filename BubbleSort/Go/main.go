package main

import (
	"fmt"
	"math/rand"
	helpers "sortings/0_Helpers/Go"
	"time"
)

func main() {
	inputSizes := []int{10, 19, 1000, 10000}
	for i := range inputSizes {
		startTime := time.Now()

		fmt.Printf("=====\nNumber of elements: %d\n", inputSizes[i])
		input := rand.Perm(inputSizes[i])
		fmt.Printf("\nNot sorted input: ")
		helpers.PrintArray(input)

		fmt.Printf("\n\nTime spent: %d milliseconds\n", time.Since(startTime).Milliseconds())
	}
}
