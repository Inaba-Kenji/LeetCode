<?php
// Given an array of integers arr, return true if the number of occurrences of each value in the array is unique or false otherwise.

class Solution {

  /**
   * @param Integer[] $arr
   * @return Boolean
   */
  function uniqueOccurrences($arr) {
    $dic = [];

    foreach ($arr as $val) {
      if (isset($dic[$val])) {
        $dic[$val]++;
      } else {
        $dic[$val] = 1;
      }
    }

    return count(array_unique($arr)) == count(array_unique($dic));
  }
}

$solution = new Solution;
$arr = [1,2,2,1,1,3];
var_dump($solution->uniqueOccurrences($arr));
