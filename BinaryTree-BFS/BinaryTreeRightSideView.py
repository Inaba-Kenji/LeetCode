# Given the root of a binary tree, imagine yourself standing on the right side of it, return the values of the nodes you can see ordered from top to bottom.

# Definition for a binary tree node.

# メモ
# 階層ごとをレベルとして分ける
# レベル0（根）: ノード1（唯一のノード）
# レベル1: ノード3（ノード2より右側にある）
# レベル2: ノード5（右側に位置するノード）

from typing import Optional, List
from collections import deque


class TreeNode:
    def __init__(self, val=0, left=None, right=None):
        self.val = val
        self.left = left
        self.right = right


class Solution:
    def rightSideView(self, root: Optional[TreeNode]) -> List[int]:
        if not root:
            return []

        result = []
        queue = deque([root])

        while queue:
            # 現在のレベルのノード数
            level_size = len(queue)

            # 現在のレベル（階層）のノードの数分だけ繰り返す
            for i in range(level_size):
                # 現在のノードを取り出す
                node = queue.popleft()

                # 最後のノードは現在のレベル(階層)で一番右側の値を取得できる
                if i == level_size - 1:
                    result.append(node.val)

                # 左の子ノードをキューに追加 (次のレベル（階層）を調べるため)
                if node.left:
                    queue.append(node.left)
                # 右の子ノードをキューに追加 (次のレベル（階層）を調べるため)
                if node.right:
                    queue.append(node.right)

        return result


# テスト関数
def test_right_side_view():
    # テストケース1
    root1 = TreeNode(1)
    root1.left = TreeNode(2)
    root1.right = TreeNode(3)
    root1.left.right = TreeNode(5)
    root1.right.right = TreeNode(4)

    solution = Solution()
    print(solution.rightSideView(root1))  # 出力: [1, 3, 4]

    # # テストケース2
    # root2 = TreeNode(1)
    # root2.right = TreeNode(3)

    # print(solution.rightSideView(root2))  # 出力: [1, 3]

    # # テストケース3
    # root3 = None
    # print(solution.rightSideView(root3))  # 出力: []


# テスト実行
test_right_side_view()
