# Given the root of a binary tree, the level of its root is 1, the level of its children is 2, and so on.

# Return the smallest level x such that the sum of all the values of nodes at level x is maximal.

# Definition for a binary tree node.


from typing import Optional
from collections import deque


class TreeNode:
    def __init__(self, val=0, left=None, right=None):
        self.val = val
        self.left = left
        self.right = right


class Solution:
    def maxLevelSum(self, root: Optional[TreeNode]) -> int:
        if not root:
            return []

        result = []
        queue = deque([root])
        tmp_sum = 0

        while queue:

            level_size = len(queue)

            for i in range(level_size):
                node = queue.popleft()

                tmp_sum += node.val

                if i == level_size - 1:
                    result.append(tmp_sum)
                    tmp_sum = 0

                if node.left:
                    queue.append(node.left)

                if node.right:
                    queue.append(node.right)

        max_value = max(result)
        return result.index(max_value) + 1
