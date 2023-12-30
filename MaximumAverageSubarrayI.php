<?php
// You are given an integer array nums consisting of n elements, and an integer k.

// Find a contiguous subarray whose length is equal to k that has the maximum average value and return this value. Any answer with a calculation error less than 10-5 will be accepted.

class Solution {

  /**
   * 与えられた整数配列から、長さ k の連続した部分配列の平均値を最大化するメソッド
   * スライディング・ウィンドウの概念を用いている
   * @param int[] $nums
   * @param int $k
   * @return Float
   */
  function findMaxAverage($nums, $k) {
    // 初期の k 要素の合計を currSum と maxSum に設定
    $currSum = $maxSum = array_sum(array_slice($nums, 0, $k));

    for ($i = $k; $i < count($nums); $i++) {
      // ウィンドウの左端の要素を引き、右端の要素を足す
      $currSum += $nums[$i] - $nums[$i - $k];
      $maxSum = max($maxSum, $currSum);
    }
    return $maxSum / $k;
  }
}

$solution = new Solution;
$nums = [1,12,-5,-6,50,3];
$k = 4;
var_dump($solution->findMaxAverage($nums, $k));
