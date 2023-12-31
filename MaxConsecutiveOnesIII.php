<?php
// Given a binary array nums and an integer k, return the maximum number of consecutive 1's in the array if you can flip at most k 0's.

class Solution {

  /**
   * 最大で K 回まで 0 を 1 に変更できる場合の最長の1の連続部分列の長さを返す
   * @param int[] $nums
   * @param int $k
   * @return int
   */
  function longestOnes($nums, $k) {
    // 左端のポインター
    $i = 0;

    // 右端のポインターを拡大するループ
    for ($j = 0; $j < count($nums); $j++) {
      // 0から1へ反転できる回数を減らす
      $k -= 1 - $nums[$j];

      // 変更できる回数が負の値の場合
      if ($k < 0) {
        // 左端の値が０の場合は変更できる回数を増やす
        $k += 1 - $nums[$i];
        $i += 1;
      }
    }
    return $j - $i;
  }
}

$solution = new Solution;
$nums = [1,1,1,0,0,0,1,1,1,1,0];
$k = 2;
var_dump($solution->longestOnes($nums, $k));
