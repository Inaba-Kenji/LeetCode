<?php
// You are given an integer array nums and an integer k.

// In one operation, you can pick two numbers from the array whose sum equals k and remove them from the array.

// Return the maximum number of operations you can perform on the array.

class Solution {

  /**
   * @param int[] $nums
   * @param int $k
   * @return int
   */
  function maxOperations($nums, $k) {
    sort($nums);
    $i = 0;                //左端のポインター
    $j = count($nums) - 1; //右端のポインター
    $count = 0;

    while ($i < $j) {
      $sum = $nums[$i] + $nums[$j];
      if ($sum == $k) {
        $i++;
        $j--;
        $count++;
      } elseif ($sum > $k) {
        $j--;
      } else {
        $i++;
      }
    }
    return $count;
  }
}

$solution = new Solution;
$nums = [1,2,3,4];
$k = 5;
var_dump($solution->maxOperations($nums, $k));
