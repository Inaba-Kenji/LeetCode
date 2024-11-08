# Given an integer n, return an array ans of length n + 1 such that for each i (0 <= i <= n), ans[i] is the number of 1's in the binary representation of i.


from typing import List


class Solution:
    def countBits(self, n: int) -> List[int]:
        counter = [0]
        for i in range(1, n + 1):
            # iの値に対して桁を一つ下げる（１と右シフトすることは割る２することと同じ）
            # iに対して割る２した値と同じだけ１を持っているので、それを参照する
            # その後に、右シフトした分の計算を行う。
            # 偶数だった場合は1の数は増えないので、何もしない
            # 奇数だった場合はその数より１大きいので＋１をする
            counter.append(counter[i >> 1] + i % 2)
        return counter


# テスト関数
def test_countBits():
    solution = Solution()

    # テストケース 1: n = 2
    # ビット数: 0 -> 0, 1 -> 1, 2 -> 10
    # 結果: [0, 1, 1]
    # assert solution.countBits(2) == [0, 1, 1], "Test case 1 failed"

    # テストケース 2: n = 5
    # ビット数: 0 -> 0, 1 -> 1, 2 -> 10, 3 -> 11, 4 -> 100, 5 -> 101
    # 結果: [0, 1, 1, 2, 1, 2]
    assert solution.countBits(5) == [0, 1, 1, 2, 1, 2], "Test case 2 failed"

    # テストケース 3: n = 0
    # ビット数: 0 -> 0
    # 結果: [0]
    # assert solution.countBits(0) == [0], "Test case 3 failed"

    # テストケース 4: n = 10
    # 結果: [0, 1, 1, 2, 1, 2, 2, 3, 1, 2, 2]
    # assert solution.countBits(10) == [
    #     0,
    #     1,
    #     1,
    #     2,
    #     1,
    #     2,
    #     2,
    #     3,
    #     1,
    #     2,
    #     2,
    # ], "Test case 4 failed"

    # # テストケース 5: n = 15 (境界値チェック)
    # # 結果: [0, 1, 1, 2, 1, 2, 2, 3, 1, 2, 2, 3, 2, 3, 3, 4]
    # assert solution.countBits(15) == [
    #     0,
    #     1,
    #     1,
    #     2,
    #     1,
    #     2,
    #     2,
    #     3,
    #     1,
    #     2,
    #     2,
    #     3,
    #     2,
    #     3,
    #     3,
    #     4,
    # ], "Test case 5 failed"

    print("All test cases passed!")


# テスト関数を実行
test_countBits()
