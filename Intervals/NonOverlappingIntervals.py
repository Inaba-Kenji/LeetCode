# Given an array of intervals intervals where intervals[i] = [starti, endi], return the minimum number of intervals you need to remove to make the rest of the intervals non-overlapping.

# Note that intervals which only touch at a point are non-overlapping. For example, [1, 2] and [2, 3] are non-overlapping.


# Example 1:

# Input: intervals = [[1,2],[2,3],[3,4],[1,3]]
# Output: 1
# Explanation: [1,3] can be removed and the rest of the intervals are non-overlapping.
# Example 2:

# Input: intervals = [[1,2],[1,2],[1,2]]
# Output: 2
# Explanation: You need to remove two [1,2] to make the rest of the intervals non-overlapping.
# Example 3:

# Input: intervals = [[1,2],[2,3]]
# Output: 0
# Explanation: You don't need to remove any of the intervals since they're already non-overlapping.


from typing import List


class Solution:
    def eraseOverlapIntervals(self, intervals: List[List[int]]) -> int:
        # 1. 終了時間（end）を基準にソート
        intervals.sort(key=lambda x: x[1])

        # 2. 変数の初期化
        prev_end = float("-inf")
        count = 0

        # 3. 各区間をチェック
        for start, end in intervals:
            if start >= prev_end:
                # 重なっていない → 採用
                prev_end = end
            else:
                # 重なっている → 削除カウント増加
                count += 1
        return count


# テストケース
solution = Solution()

# Test case 1
intervals1 = [[1, 2], [2, 3], [3, 4], [1, 3]]
print(solution.eraseOverlapIntervals(intervals1))  # 出力: 1

# Test case 2
intervals2 = [[1, 2], [1, 2], [1, 2]]
print(solution.eraseOverlapIntervals(intervals2))  # 出力: 2

# Test case 3
intervals3 = [[1, 2], [2, 3]]
print(solution.eraseOverlapIntervals(intervals3))  # 出力: 0
