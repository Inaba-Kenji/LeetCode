<?php
// Given an integer array nums, move all 0's to the end of it while maintaining the relative order of the non-zero elements.

// Note that you must do this in-place without making a copy of the array.

class Solution {
  /**
   * @param Integer[] $nums
   * @return NULL
   */
  function moveZeroes(&$nums): void {
    $counter = 0;

    foreach ($nums as $key => $val) {
      if ($val == 0) {
        unset($nums[$key]);
        $counter++;
      }
    }

    for ($i = 0; $i < $counter; $i++) {
      array_push($nums, 0);
    }
  }
}

$solution = new Solution;
$nums = [0,1,0,3,12];
var_dump($solution->moveZeroes($nums));
