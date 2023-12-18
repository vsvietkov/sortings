package Decorators

import (
	"fmt"
	. "sortings/0_Helpers/Go/SortingAlgorithm"
	"time"
)

type ExecutionStatisticsDecorator struct {
	Component ISortingAlgorithm
}

func (esd ExecutionStatisticsDecorator) Run() {
	startTime := time.Now()

	esd.Component.Run()

	fmt.Printf("\n\nTime spent: %d milliseconds\n", time.Since(startTime).Milliseconds())
}
