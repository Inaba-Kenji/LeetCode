<?php
// You are given an integer array height of length n. There are n vertical lines drawn such that the two endpoints of the ith line are (i, 0) and (i, height[i]).

// Find two lines that together with the x-axis form a container, such that the container contains the most water.

// Return the maximum amount of water a container can store.

// Notice that you may not slant the container.

class Solution {

  /**
   * @param Integer[] $height
   * @return Integer
   */
  function maxArea(array $height): int {
    $result = 0;
    $i = 0;                  //左端のポインター
    $j = count($height) - 1; //右端のポインター

    while ($i !== $j) {
      $h = min($height[$i], $height[$j]);
      $area = $h * ($j - $i);

      if ($area > $result) {
        $result = $area;
      }

      $height[$i] > $height[$j] ? $j-- : $i++;
    }
    return $result;
  }
}

$solution = new Solution;
$height = [1,8,6,2,5,4,8,3,7];
var_dump($solution->maxArea($height));
