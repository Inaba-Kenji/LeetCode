from typing import List


class Solution:
    def findCircleNum(self, isConnected: List[List[int]]) -> int:
        def dfs(city):
            # 訪問した都市を記録
            visited[city] = True
            # その都市に接続されている都市を再帰的に探索
            # 下記でその都市に連結された都市を見つけて訪問済みにする。それによって、一つのプロビンスとみなす。
            for adjacent in range(n):
                if isConnected[city][adjacent] == 1 and not visited[adjacent]:
                    dfs(adjacent)

        n = len(isConnected)  # 都市の数
        visited = [False] * n  # 訪問済みの都市を記録するリスト
        provinces = 0  # プロビンスの数

        # 各都市を訪問し、未訪問の都市があれば新たなプロビンスとしてカウント
        for city in range(n):
            if not visited[city]:
                dfs(city)
                provinces += 1  # 新しいプロビンスを見つけたのでカウントを増やす

        return provinces


# テストケース
if __name__ == "__main__":
    solution = Solution()

    # テストケース: isConnected = [[1,1,0],[1,1,0],[0,0,1]]
    isConnected = [[1, 1, 0], [1, 1, 0], [0, 0, 1]]
    result = solution.findCircleNum(isConnected)

    print("Output:", result)  # 出力: 2
