package BubbleSort

type BubbleSort struct {
	Input []int
}

func (bs BubbleSort) Run() {
	lastIndex := len(bs.Input) - 1

	for i := 0; i < lastIndex; i++ {
		swapped := false

		for j := 0; j < lastIndex-i; j++ {
			if bs.Input[j] > bs.Input[j+1] {
				bs.Input[j], bs.Input[j+1] = bs.Input[j+1], bs.Input[j]
				swapped = true
			}
		}

		if !swapped {
			break
		}
	}
}
