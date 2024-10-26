# Given a root node reference of a BST and a key, delete the node with the given key in the BST. Return the root node reference (possibly updated) of the BST.
# Basically, the deletion can be divided into two stages:


class TreeNode:
    def __init__(self, val=0, left=None, right=None):
        self.val = val
        self.left = left
        self.right = right


class Solution:
    def deleteNode(self, root: TreeNode, key: int) -> TreeNode:
        # ノードが存在しない場合
        if not root:
            return None

        # 削除するノードを探す
        if key < root.val:
            root.left = self.deleteNode(root.left, key)
        elif key > root.val:
            root.right = self.deleteNode(root.right, key)
        else:
            # ノードを削除する
            if not root.left:  # 左の子ノードがない場合 or 両方の子ノードがない場合
                return root.right
            elif not root.right:  # 右の子ノードがない場合
                return root.left

            # 両方の子ノードがある場合
            min_larger_node = self.get_min(root.right)  # 右部分木の最小ノードを見つける
            root.val = min_larger_node.val  # 現在のノードの値を更新
            root.right = self.deleteNode(
                root.right, min_larger_node.val
            )  # 最小ノードを削除

        return root

    def get_min(self, node: TreeNode) -> TreeNode:
        while node.left:
            node = node.left
        return node


# def print_tree(root, level=0, label="."):
#     # ツリー構造を見やすく表示する
#     print(
#         " " * (level * 4) + f"{label}: {root.val}"
#         if root
#         else " " * (level * 4) + f"{label}: None"
#     )
#     if root:
#         if root.left or root.right:
#             print_tree(root.left, level + 1, "L")
#             print_tree(root.right, level + 1, "R")

#             # ノードを作成


root = TreeNode(5)
root.left = TreeNode(3)
root.right = TreeNode(6)
root.left.left = TreeNode(2)
root.left.right = TreeNode(4)
root.right.right = TreeNode(7)

# 削除前のツリーを表示
# print("Before deletion:")
# print_tree(root)

# # ノードを削除
solution = Solution()
solution.deleteNode(root, 3)

# # 削除後のツリーを表示
# print("\nAfter deletion:")
# print_tree(root)
