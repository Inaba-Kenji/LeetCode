# Given a non-empty array of integers nums, every element appears twice except for one. Find that single one.

# You must implement a solution with a linear runtime complexity and use only constant extra space.

# (1)    a xor b xor ... xor c のように複数個のものの xor をとった場合、a, b, ..., c の中で 1 であるものの個数が奇数個ならば結果は 1、偶数個ならば結果は０となる。
# (2)    a xor a = 0
# (3)    a xor b = 0 ならば a = b

# 010 2
# 100 4
# 111 7
# 110 6
# 100 4
# 111 7
# 110 6


from typing import List


class Solution:
    def singleNumber(self, nums: List[int]) -> int:
        result = 0
        for num in nums:
            result ^= num
        return result
