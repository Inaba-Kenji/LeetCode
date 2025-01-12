# 236. Lowest Common Ancestor of a Binary Tree
# Medium
# Topics
# Companies
# Given a binary tree, find the lowest common ancestor (LCA) of two given nodes in the tree.

# According to the definition of LCA on Wikipedia: “The lowest common ancestor is defined between two nodes p and q as the lowest node in T that has both p and q as descendants (where we allow a node to be a descendant of itself).”

# Constraints:

# The number of nodes in the tree is in the range [2, 105].
# -109 <= Node.val <= 109
# All Node.val are unique.
# p != q
# p and q will exist in the tree.


# Definition for a binary tree node.
class TreeNode:
    def __init__(self, x):
        self.val = x
        self.left = None
        self.right = None


class Solution:
    def lowestCommonAncestor(
        self, root: "TreeNode", p: "TreeNode", q: "TreeNode"
    ) -> "TreeNode":
        # ベースケース: 現在のノードが None、p、または q の場合、現在のノードを返す
        if not root or root == p or root == q:
            return root

        # 左の部分木を探索
        left = self.lowestCommonAncestor(root.left, p, q)
        # 右の部分木を探索
        right = self.lowestCommonAncestor(root.right, p, q)

        # 両方あるということは現在のrootのノードが共通のノードになるので、それを上位に返してあげる。
        # 他は、Noneが返されていくのでこの共通の値が最終的にreturnされる
        if left and right:
            return root

        # どちらか一方の部分木に共通祖先がいる場合、その部分木を返す
        # Noneではない場合は要するに数字がある場合は、その値を上位に返してあげる。
        return left if left else right


# テスト用のツリーを構築して動作を確認
if __name__ == "__main__":
    # テストケース 1: root = [3,5,1,6,2,0,8,null,null,7,4], p = 5, q = 1
    root = TreeNode(3)
    root.left = TreeNode(5)
    root.right = TreeNode(1)
    root.left.left = TreeNode(6)
    root.left.right = TreeNode(2)
    root.right.left = TreeNode(0)
    root.right.right = TreeNode(8)
    # root.left.right.left = TreeNode(7)
    # root.left.right.right = TreeNode(4)

    # p = root.left  # ノード 5
    # q = root.right  # ノード 1

    solution = Solution()
    # print(solution.lowestCommonAncestor(root, p, q).val)  # 出力: 3

    # # テストケース 2: p = 5, q = 4
    # p = root.left  # ノード 5
    # q = root.left.right.right  # ノード 4
    # print(solution.lowestCommonAncestor(root, p, q).val)  # 出力: 5

    # テストケース 2: p = 8, q = 6
    p = root.right.right  # ノード 8
    q = root.left.left  # ノード 6
    print(solution.lowestCommonAncestor(root, p, q).val)  # 出力: 3

    # # テストケース 3: root = [1,2], p = 1, q = 2
    # root = TreeNode(1)
    # root.left = TreeNode(2)
    # p = root  # ノード 1
    # q = root.left  # ノード 2
    # print(solution.lowestCommonAncestor(root, p, q).val)  # 出力: 1
