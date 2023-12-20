<?php
// Given an integer array nums, return an array answer such that answer[i] is equal to the product of all the elements of nums except nums[i].

// The product of any prefix or suffix of nums is guaranteed to fit in a 32-bit integer.

// You must write an algorithm that runs in O(n) time and without using the division operation.

class Solution {

  /**
   * @param int[] $nums
   * @return int[]
   */
  function productExceptSelf(array $nums): array {
      $ans = [];
      $pre = 1;
      $suff = 1;

      // $num[$i]の左側の積を計算
      for($i = 0; $i < count($nums); $i++)
      {
          $ans[] = $pre;
          $pre *= $nums[$i];
      }
      // $num[$i]の右側の積を計算
      for($i = count($nums) - 1; $i >= 0; $i--)
      {
          $ans[$i] *= $suff;
          $suff *= $nums[$i];
      }

      return $ans;
  }
}

$solution = new Solution;
$nums = [1, 2, 3, 4];
var_dump($solution->productExceptSelf($nums));
