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
    $leftSum = array_sum($nums) - $nums[0];
    $rightSum = 0;

    for ($i = 0; $i < count($nums); $i++) {
      if ($leftSum == $rightSum) {
        return $i;
      } elseif ($i !== count($nums) - 1) {
        $leftSum -= $nums[$i + 1];
        $rightSum += $nums[$i];
      }
    }
    return -1;
  }
}

$solution = new Solution;
$nums = [-1,-1,0,1,1,0];
var_dump($solution->pivotIndex($nums));
