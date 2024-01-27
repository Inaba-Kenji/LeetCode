<?php
// Consider all the leaves of a binary tree, from left to right order, the values of those leaves form a leaf value sequence.

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
   * @param TreeNode $root1
   * @param TreeNode $root2
   * @return Boolean
   */
  function leafSimilar($root1, $root2) {
    $leafs1 = $this->getLeafs($root1);
    $leafs2 = $this->getLeafs($root2);
    return $leafs1 == $leafs2;
  }

  /**
   *
   *
   * @param TreeNode $root
   * @return array
   */
  private function getLeafs($root) {
    $result = [];
    $this->dfs($root, $result);
    return $result;
  }

  /**
   * 木構造のものから葉の値を取得する
   *
   * @param TreeNode $node
   * @return array $result
   *
   */

  private function dfs($node, &$result) {
    if ($node == null) {
      return;
    }

    if ($node->left == null && $node->right == null) {
      $result[] = $node->val;
    }

    $this->dfs($node->left, $result);
    $this->dfs($node->right, $result);
  }
}

// Example usage:
$root1 = new TreeNode(1);
$root1->left = new TreeNode(2);
$root1->right = new TreeNode(3);

$root2 = new TreeNode(1);
$root2->left = new TreeNode(3);
$root2->right = new TreeNode(2);

$solution = new Solution();
$solution->leafSimilar($root1, $root2);
