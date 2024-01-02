<?php
// Given a binary array nums, you should delete one element from it.

// Return the size of the longest non-empty subarray containing only 1's in the resulting array. Return 0 if there is no such subarray.

class Solution {

  /**
   * @param int[] $nums
   * @return int
   */
  function longestSubarray($nums) {
    $zeroCount = 0;
    $longestWindow = 0;
    $j = 0;

    for ($i = 0; $i < count($nums); $i++) {
      $zeroCount += ($nums[$i] == 0);

      while ($zeroCount > 1) {
        $zeroCount -= ($nums[$j] == 0);
        $j++;
      }

      $longestWindow = max($longestWindow, $i - $j);
    }
    return $longestWindow;
  }
}

$solution = new Solution;
$nums = [0,1,1,1,0,1,1,0,1];
var_dump($solution->longestSubarray($nums));
