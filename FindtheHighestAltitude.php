<?php
// There is a biker going on a road trip. The road trip consists of n + 1 points at different altitudes. The biker starts his trip on point 0 with altitude equal 0.

// You are given an integer array gain of length n where gain[i] is the net gain in altitude between points i​​​​​​ and i + 1 for all (0 <= i < n). Return the highest altitude of a point.

class Solution {

  /**
   * @param int[] $gain
   * @return int
   */
  function largestAltitude($gain) {
    $preAltitude = 0;
    array_unshift($gain, 0);

    for ($i = 1; $i < count($gain); $i++) {
      $gain[$i] = $preAltitude + $gain[$i];
      $preAltitude = $gain[$i];
    }
    return max($gain);
  }
}

$solution = new Solution;
$gain = [-5,1,5,0,-7];
var_dump($solution->largestAltitude($gain));
