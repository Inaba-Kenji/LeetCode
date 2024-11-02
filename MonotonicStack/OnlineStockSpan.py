# Design an algorithm that collects daily price quotes for some stock and returns the span of that stock's price for the current day.
# The span of the stock's price in one day is the maximum number of consecutive days (starting from that day and going backward) for which the stock price was less than or equal to the price of that day.
# For example, if the prices of the stock in the last four days is [7,2,1,2] and the price of the stock today is 2, then the span of today is 4 because starting from today, the price of the stock was less than or equal 2 for 4 consecutive days.
# Also, if the prices of the stock in the last four days is [7,34,1,2] and the price of the stock today is 8, then the span of today is 3 because starting from today, the price of the stock was less than or equal 8 for 3 consecutive days.
# Implement the StockSpanner class:

# 下記のコードの場合にスパンの値を知っていれば、101と102の比較一回でスパンの値を求めることができる。１回目に書いた自分のコードのように配列分比較しなくていい
# [100, 99, 98, 97, 96, 95, 94, 101, 102]


class StockSpanner:

    def __init__(self):
        self.stack = []

    def next(self, price: int) -> int:
        span = 1
        while self.stack and self.stack[-1][0] <= price:
            span += self.stack.pop()[1]
        self.stack.append((price, span))
        return span


if __name__ == "__main__":
    stockSpanner = StockSpanner()
    print(stockSpanner.next(100))
    print(stockSpanner.next(80))
    print(stockSpanner.next(60))
    print(stockSpanner.next(70))
    print(stockSpanner.next(60))
    print(stockSpanner.next(75))
    print(stockSpanner.next(85))

# 自分が１回目に書いた例
# def __init__(self):
#     self.stack = []

# def next(self, price: int) -> int:
#     self.stack.append(price)
#     span = 0
#     for i in range(len(self.stack) - 1, -1, -1):
#         if self.stack[i] <= price:
#             span = span + 1
#         else:
#             break
#     return span
