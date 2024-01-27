<?php

// Given a binary tree root, a node X in the tree is named good if in the path from root to X there are no nodes with a value greater than X.

// Return the number of good nodes in the binary tree.

// Definition for a binary tree node.

class TreeNode {
  public $val;
  public $left;
  public $right;
  function __construct($val = 0, $left = null, $right = null) {
      $this->val = $val;
      $this->left = $left;
      $this->right = $right;
  }
}

class Solution {

  /**
   * @param TreeNode $root
   * @return int
   */
  function goodNodes($root) {
      return $this->dfs($root, PHP_INT_MIN);
  }

  /**
   * 木構造のノードからルートノードの値以上のノードの数を数える
   *
   * @param TreeNode $node
   * @param int $rootVal
   * @return int
   */
  private function dfs($node, $rootVal) {
      if ($node == null) {
          return 0;
      }

      $count = ($node->val >= $rootVal) ? 1 : 0;

      $count += $this->dfs($node->left, max($rootVal, $node->val));
      $count += $this->dfs($node->right, max($rootVal, $node->val));

      return $count;
  }
}

// 二分木の構築
$root = new TreeNode(3);
$root->left = new TreeNode(1);
$root->right = new TreeNode(4);
$root->left->left = new TreeNode(3);
$root->left->right = new TreeNode(1);
$root->right->right = new TreeNode(5);

// Solutionのインスタンスを作成
$solution = new Solution();

// 良いノードの数を求める
$result = $solution->goodNodes($root);

// 結果を表示
echo "Number of Good Nodes: $result";
