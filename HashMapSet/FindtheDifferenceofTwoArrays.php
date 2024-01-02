<?php
// Given two 0-indexed  int arrays nums1 and nums2, return a list answer of size 2 where:

// answer[0] is a list of all distinct  ints in nums1 which are not present in nums2.
// answer[1] is a list of all distinct  ints in nums2 which are not present in nums1.
// Note that the  ints in the lists may be returned in any order.

class Solution {

  /**
   * 2つの配列のうち、最初の配列にだけ存在し、かつ2番目の配列には存在しない値を取得する関数
   * @param array $array1 最初の配列
   * @param array $array2 2番目の配列
   * @return array 最初の配列にだけ存在し、かつ2番目の配列には存在しない値の配列
   */

  function getElementsOnlyInFirstList($array1, $array2) {
    $onlyInArray1 = [];
    $existsInArray2 = array_flip($array2);

    foreach ($array1 as $value) {
      if (!isset($existsInArray2[$value])) {
        $onlyInArray1[] = $value;
      }
    }

    return array_unique($onlyInArray1);
  }

  /**
   * @param  int[] $nums1
   * @param  int[] $nums2
   * @return  int[][]
   */
  function findDifference($nums1, $nums2) {
    $onlyInNums1 = $this->getElementsOnlyInFirstList($nums1, $nums2);
    $onlyInNums2 = $this->getElementsOnlyInFirstList($nums2, $nums1);

    return [$onlyInNums1, $onlyInNums2];
  }
}

// Example usage:
$solution = new Solution;
$nums1 = [1,2,3,3];
$nums2 = [1,1,2,2];
var_dump($solution->findDifference($nums1, $nums2));
