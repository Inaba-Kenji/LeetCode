# 1466. Reorder Routes to Make All Paths Lead to the City Zero
# Medium
# Topics
# Companies
# Hint
# There are n cities numbered from 0 to n - 1 and n - 1 roads such that there is only one way to travel between two different cities (this network form a tree). Last year, The ministry of transport decided to orient the roads in one direction because they are too narrow.

# Roads are represented by connections where connections[i] = [ai, bi] represents a road from city ai to city bi.

# This year, there will be a big event in the capital (city 0), and many people want to travel to this city.

# Your task consists of reorienting some roads such that each city can visit the city 0. Return the minimum number of edges changed.

# It's guaranteed that each city can reach city 0 after reorder.


# Example 1:


# Input: n = 6, connections = [[0,1],[1,3],[2,3],[4,0],[4,5]]
# Output: 3
# Explanation: Change the direction of edges show in red such that each node can reach the node 0 (capital).
# Example 2:


# Input: n = 5, connections = [[1,0],[1,2],[3,2],[3,4]]
# Output: 2
# Explanation: Change the direction of edges show in red such that each node can reach the node 0 (capital).
# Example 3:

# Input: n = 3, connections = [[1,0],[2,0]]
# Output: 0


from collections import defaultdict
from typing import List


class Solution:
    def minReorder(self, n: int, connections: List[List[int]]) -> int:
        # 1. 隣接リストを作成（無向グラフ）
        adj = defaultdict(list)
        for a, b in connections:
            adj[a].append(
                (b, 1)
            )  # 元の方向(0から深さ優先で辿っていくので、directionが1の時は遠くなっている)
            adj[b].append((a, 0))  # 逆方向

        # 2. DFS で探索
        def dfs(city, parent):
            # 方向を変える必要がある回数
            changes = 0
            for neighbor, direction in adj[city]:
                if neighbor == parent:
                    continue  # 親ノードには戻らない(親ノードに戻ると無限ループに陥る危険があるため)
                if direction == 1:
                    changes += 1  # 方向を変える必要がある
                changes += dfs(neighbor, city)
            return changes

        # 3. 探索開始
        return dfs(0, -1)  # 都市0からスタート


# テスト
solution = Solution()
print(solution.minReorder(6, [[0, 1], [1, 3], [2, 3], [4, 0], [4, 5]]))  # 出力: 3
print(solution.minReorder(5, [[1, 0], [1, 2], [3, 2], [3, 4]]))  # 出力: 2
print(solution.minReorder(3, [[1, 0], [2, 0]]))  # 出力: 0
