<?php
// Given an array of integers arr, return true if the number of occurrences of each value in the array is unique or false otherwise.

class Solution {

  /**
   * @param Integer[] $arr
   * @return Boolean
   */
  function uniqueOccurrences($arr) {
    $arr = array_count_values($arr);
    $uniqueArr = array_unique($arr);
    if (count($arr) == count($uniqueArr)) {
      return true;
    }
    return false;
  }
}

$solution = new Solution;
$arr = [1,2];
var_dump($solution->uniqueOccurrences($arr));
