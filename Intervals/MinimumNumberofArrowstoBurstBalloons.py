# There are some spherical balloons taped onto a flat wall that represents the XY-plane. The balloons are represented as a 2D integer array points where points[i] = [xstart, xend] denotes a balloon whose horizontal diameter stretches between xstart and xend. You do not know the exact y-coordinates of the balloons.

# Arrows can be shot up directly vertically (in the positive y-direction) from different points along the x-axis. A balloon with xstart and xend is burst by an arrow shot at x if xstart <= x <= xend. There is no limit to the number of arrows that can be shot. A shot arrow keeps traveling up infinitely, bursting any balloons in its path.

# Given the array points, return the minimum number of arrows that must be shot to burst all balloons.


# Example 1:

# Input: points = [[10,16],[2,8],[1,6],[7,12]]
# Output: 2
# Explanation: The balloons can be burst by 2 arrows:
# - Shoot an arrow at x = 6, bursting the balloons [2,8] and [1,6].
# - Shoot an arrow at x = 11, bursting the balloons [10,16] and [7,12].
# Example 2:

# Input: points = [[1,2],[3,4],[5,6],[7,8]]
# Output: 4
# Explanation: One arrow needs to be shot for each balloon for a total of 4 arrows.
# Example 3:

# Input: points = [[1,2],[2,3],[3,4],[4,5]]
# Output: 2
# Explanation: The balloons can be burst by 2 arrows:
# - Shoot an arrow at x = 2, bursting the balloons [1,2] and [2,3].
# - Shoot an arrow at x = 4, bursting the balloons [3,4] and [4,5].


from typing import List


class Solution:
    def findMinArrowShots(self, points: List[List[int]]) -> int:
        # 風船を終了位置（x_end）でソート
        points.sort(key=lambda x: x[1])

        # 初めの風船で矢を1本撃つ
        prev_end = points[0][1]
        arrows = 1

        # 2つ目以降の風船をチェック
        for x_start, x_end in points[1:]:
            if prev_end < x_start:
                prev_end = x_end
                arrows += 1
        return arrows


# テストケース
solution = Solution()

# Test case 1
intervals1 = [[10, 16], [2, 8], [1, 6], [7, 12]]
print(solution.findMinArrowShots(intervals1))  # 出力: 2

# Test case 2
intervals2 = [[1, 2], [3, 4], [5, 6], [7, 8]]
print(solution.findMinArrowShots(intervals2))  # 出力: 4

# Test case 3
intervals3 = [[1, 2], [2, 3], [3, 4], [4, 5]]
print(solution.findMinArrowShots(intervals3))  # 出力: 2
