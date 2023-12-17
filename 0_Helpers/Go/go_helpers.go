package helpers

import "fmt"

func PrintArray(arr []int) {
	lastIndex := len(arr) - 1
	endSymbol := ", "
	fmt.Printf("[")

	for index := 0; index <= lastIndex; index++ {
		if index > 20 {
			fmt.Print("...]")
			break
		}

		if index == lastIndex {
			endSymbol = "]"
		}
		fmt.Printf("%d%s", arr[index], endSymbol)
	}
}
