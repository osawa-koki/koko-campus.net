package main

func calcPageNum(curr int, maxP int) (prev string, next string) {
	var a, b string = "", ""
	if curr != 0 {
		a = zPad2(curr - 1)
	}
	if curr != maxP {
		b = zPad2(curr + 1)
	}
	return a, b
}