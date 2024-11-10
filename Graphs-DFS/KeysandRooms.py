from typing import List


class Solution:
    def canVisitAllRooms(self, rooms: List[List[int]]) -> bool:
        # 訪問した部屋を記録する集合 (集合はユニークな値のみ取得する)
        visited = set()

        def dfs(room):
            if room in visited:
                return
            # 現在の部屋を訪問済みとする
            visited.add(room)
            for key in rooms[room]:
                # その部屋で見つかった鍵で他の部屋を訪問
                dfs(key)

        # 部屋0から探索を開始
        dfs(0)

        # 訪問した部屋の数が総部屋数と同じならTrueを返す
        return len(visited) == len(rooms)


solution = Solution()
print(solution.canVisitAllRooms([[1], [2], [3], []]))  # True
print(solution.canVisitAllRooms([[1, 3], [3, 0, 1], [2], [0]]))  # False
