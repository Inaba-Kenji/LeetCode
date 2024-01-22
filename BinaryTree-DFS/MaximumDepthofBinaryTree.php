<?php
// Given the root of a binary tree, return its maximum depth.

// A binary tree's maximum depth is the number of nodes along the longest path from the root node down to the farthest leaf node.


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
   * @return Integer
   */
  function maxDepth($root) {
      if ($root === null) {
          // 基底ケース
          return 0;
      } else {
          $leftDepth = $this->maxDepth($root->left);
          $rightDepth = $this->maxDepth($root->right);
          return max($leftDepth, $rightDepth) + 1;
      }
  }
}

// Example usage:
$tree = new TreeNode(1);
$tree->left = new TreeNode(2);
$tree->right = new TreeNode(3);
$tree->left->left = new TreeNode(4);
$tree->left->right = new TreeNode(5);

$solution = new Solution();
$result = $solution->maxDepth($tree);
