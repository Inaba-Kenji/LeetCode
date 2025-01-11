# You are given the root of a binary tree.

# A ZigZag path for a binary tree is defined as follow:

# Choose any node in the binary tree and a direction (right or left).
# If the current direction is right, move to the right child of the current node; otherwise, move to the left child.
# Change the direction from right to left or from left to right.
# Repeat the second and third steps until you can't move in the tree.
# Zigzag length is defined as the number of nodes visited - 1. (A single node has a length of 0).

# Return the longest ZigZag path contained in that tree.

# Input: root = [1,null,1,1,1,null,null,1,1,null,1,null,null,null,1]
# Output: 3
# Explanation: Longest ZigZag path in blue nodes (right -> left -> right).

from typing import Optional


# Definition for a binary tree node.
class TreeNode:
    def __init__(self, val=0, left=None, right=None):
        self.val = val
        self.left = left
        self.right = right


class Solution:
    def longestZigZag(self, root: Optional[TreeNode]) -> int:
        self.max_length = 0

        def dfs(node, direction, length):
            if not node:
                return

            self.max_length = max(self.max_length, length)

            if direction == "left":
                # 左に再スタート(途中で始まるパターン)
                dfs(node.left, "left", 1)
                # 右にジグザグ
                dfs(node.right, "right", length + 1)
            elif direction == "right":
                # 左にジグザグ
                dfs(node.left, "left", length + 1)
                # 右に再スタート(途中で始まるパターン)
                dfs(node.right, "right", 1)

        # ルートから開始して、左右両方向を試す
        dfs(root.left, "left", 1)
        dfs(root.right, "right", 1)

        return self.max_length


if __name__ == "__main__":
    root1 = TreeNode(1)
    root1.right = TreeNode(1)
    root1.right.left = TreeNode(1)
    root1.right.right = TreeNode(1)
    root1.right.left.left = TreeNode(1)
    root1.right.left.right = TreeNode(1)
    root1.right.left.right.right = TreeNode(1)

    # テストケース 3: root = [1]
    # root3 = TreeNode(1)

    solution = Solution()
    print(solution.longestZigZag(root1))  # 出力: 3
    # print(solution.longestZigZag(root3))  # 出力: 0
