<?php
// Given an array of integers nums, calculate the pivot index of this array.

// The pivot index is the index where the sum of all the numbers strictly to the left of the index is equal to the sum of all the numbers strictly to the index's right.

// If the index is on the left edge of the array, then the left sum is 0 because there are no elements to the left. This also applies to the right edge of the array.

// Return the leftmost pivot index. If no such index exists, return -1.

class Solution {

  /**
   * @param int[] $nums
   * @return int
   */
  function pivotIndex($nums) {
    $leftSum = 0;
    $rightSum = array_sum($nums);

    foreach ($nums as $key => $value) {
      $rightSum -= $value;

      if ($leftSum == $rightSum) {
        return $key;
      }

      $leftSum += $value;
    }
    return -1;
  }
}

$solution = new Solution;
$nums = [-1,-1,0,1,1,0];
var_dump($solution->pivotIndex($nums));
