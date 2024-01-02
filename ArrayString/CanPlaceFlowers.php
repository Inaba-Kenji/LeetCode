<?php

// You have a long flowerbed in which some of the plots are planted, and some are not. However, flowers cannot be planted in adjacent plots.

// Given an integer array flowerbed containing 0's and 1's, where 0 means empty and 1 means not empty, and an integer n, return true if n new flowers can be planted in the flowerbed without violating the no-adjacent-flowers rule and false otherwise.

class Solution {

  /**
   * @param int[] $flowerbed
   * @param int $n
   * @return bool
   */
  function canPlaceFlowers(array $flowerbed, int $n): bool {
    $count = 0;
    $length = count($flowerbed);

    for($i = 0; $i < $length; $i++) {
      // 一番左と右の花壇の時は左側の条件式しか判定しないためエラーは出ない想定
      if ($flowerbed[$i] == 0) {
        $emptyLeftPlot = ($i == 0) || ($flowerbed[$i - 1] == 0);
        $emptyRightPlot = ($i == $length - 1) || ($flowerbed[$i + 1] == 0);

        if ($emptyLeftPlot && $emptyRightPlot) {
          // 例:$flowerbed = [1,0,0,0,0,1] n = 2の時のために下記の記述は必要
          $flowerbed[$i] = 1;
          $count++;
        }
      }
    }

    return $count >= $n;
  }
}
