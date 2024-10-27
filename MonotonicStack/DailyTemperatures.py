# Given an array of integers temperatures represents the daily temperatures, return an array answer such that answer[i] is the number of days you have to wait after the ith day to get a warmer temperature. If there is no future day for which this is possible, keep answer[i] == 0 instead.


# Input: temperatures = [73,74,75,71,69,72,76,73]
# Output: [1,1,4,2,1,1,0,0]

from typing import List


class Solution:
    def dailyTemperatures(self, temperatures: List[int]) -> List[int]:
        st = []
        # 配列の長さ分0で初期化してあげる(次の暖かい日が存在しない場合のため)
        res = [0] * len(temperatures)

        for i in range(len(temperatures)):
            # 現在の気温が前日の気温よりも高い場合は、スタックにある値と比較し続ける
            # [理由]今まで、現在の温度が前の日よりも寒い場合に日をスタックに追加しているので、スタック内の温度は減少する順序になっているから。
            while st and temperatures[i] > temperatures[st[-1]]:
                idx = st.pop()
                res[idx] = i - idx
            # スタックが空の場合 or 現在の気温が前日の気温よりも寒い日場合 スタックに追加
            # (例) st = [2, 3, 4]
            st.append(i)

        return res


# 実行部分
if __name__ == "__main__":
    solution = Solution()
    temperatures = [73, 74, 75, 71, 69, 72, 76, 73]
    result = solution.dailyTemperatures(temperatures)
    print(result)  # 出力: [1, 1, 4, 2, 1, 1, 0, 0]
