<?php
// Given two 0-indexed  int arrays nums1 and nums2, return a list answer of size 2 where:

// answer[0] is a list of all distinct  ints in nums1 which are not present in nums2.
// answer[1] is a list of all distinct  ints in nums2 which are not present in nums1.
// Note that the  ints in the lists may be returned in any order.

class Solution {
  /**
   * @param  int[] $nums1
   * @param  int[] $nums2
   * @return  int[][]
   */
  function findDifference($nums1, $nums2) {
    $result = array();
    $result[0] = array_unique(array_diff($nums1, $nums2));
    $result[1] = array_unique(array_diff($nums2, $nums1));
    return $result;
  }
}

// Example usage:
$solution = new Solution;
$nums1 = [1,2,3,3];
$nums2 = [1,1,2,2];
var_dump($solution->findDifference($nums1, $nums2));
