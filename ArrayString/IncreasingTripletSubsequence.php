<?php
// Given an integer array nums, return true if there exists a triple of indices (i, j, k) such that i < j < k and nums[i] < nums[j] < nums[k]. If no such indices exists, return false.

class Solution {

  /**
   * @param Integer[] $nums
   * @return Boolean
   */
  function increasingTriplet(array $nums): bool {
    $numsCount = count($nums);

    if ($numsCount < 3) {
      return false;
    }

    $smallest = PHP_INT_MAX;
    $secondSmallest = PHP_INT_MAX;

    foreach ($nums as $num) {
      if ($num <= $smallest) {
        $smallest = $num;
      } elseif ($num <= $secondSmallest) {
        $secondSmallest = $num;
      } else {
        return true;
      }
    }
    return false;
  }
}

$solution = new Solution;
$nums = [2,1,5,0,6,4];
var_dump($solution->increasingTriplet($nums));
