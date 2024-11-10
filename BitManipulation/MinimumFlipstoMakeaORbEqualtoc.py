# Given 3 positives numbers a, b and c. Return the minimum flips required in some bits of a and b to make ( a OR b == c ). (bitwise OR operation).
# Flip operation consists of change any single bit 1 to 0 or change the bit 0 to 1 in their binary representation.


class Solution:
    def minFlips(self, a: int, b: int, c: int) -> int:
        # ビット反転のカウント
        flips = 0

        # 各ビットを右から左に見ていく（a, b, c が0になるまで）
        while a > 0 or b > 0 or c > 0:
            # 最下位ビットをそれぞれ取得
            bit_a = a & 1
            bit_b = b & 1
            bit_c = c & 1

            # ビットが一致しない場合の処理
            if (bit_a | bit_b) != bit_c:
                if bit_c == 1:
                    # `a OR b` が 1 でない場合、少なくとも1つのビットを1にする必要がある
                    flips += 1

                else:
                    # `a OR b` が 0 でない場合、1に設定されたビットを2つとも0にする必要がある
                    # bit_aのみ反転の場合 bit_a = 1 bit_b = 0 なので足されるのは1
                    # bit_bのみ反転の場合 bit_a = 0 bit_b = 1 なので足されるのは1
                    # 両方反転の場合 bit_a = 1 bit_b = 1 なので足されるのは2
                    flips += bit_a + bit_b

            # 各数のビットを1ビット右シフトして次の桁へ
            a >>= 1
            b >>= 1
            c >>= 1

        return flips


# テストケースをリストにまとめる
test_cases = [
    (2, 6, 5),  # 期待結果: 3
    (4, 2, 7),  # 期待結果: 1
    (1, 2, 3),  # 期待結果: 0
    (8, 4, 15),  # 期待結果: 4
    (7, 7, 7),  # 期待結果: 0
    (15, 15, 0),  # 期待結果: 4
]

# Solutionクラスのインスタンスを作成
solution = Solution()

# 各テストケースを実行し、結果を表示
for a, b, c in test_cases:
    result = solution.minFlips(a, b, c)
    print(f"minFlips({a}, {b}, {c}) = {result}")
