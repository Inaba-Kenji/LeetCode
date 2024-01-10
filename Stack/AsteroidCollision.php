<?php
// We are given an array asteroidseroids of integers representing asteroidseroids in a row.

// For each asteroidseroid, the absolute value represents its size, and the sign represents its direction (positive meaning right, negative meaning left). Each asteroidseroid moves at the same speed.

// Find out the state of the asteroidseroids after all collisions. If two asteroidseroids meet, the smaller one will explode. If both are the same size, both will explode. Two asteroidseroids moving in the same direction will never meet.

class Solution {
  /**
   * @param int[] $asteroids
   * @return int[]
   */
  function asteroidCollision($asteroids) {
      $stack = [];

      for ($i = 0; $i < count($asteroids); $i++) {
          // 惑星が右に移動しているか、スタックが空の場合（この場合に負の値が入ることがある）
          if ($asteroids[$i] > 0 || empty($stack)) {
              array_push($stack, $asteroids[$i]);
          } else {
              // 惑星が左に移動している場合の衝突を処理
              // 空の場合はend($stack)の処理でエラーが出る可能性がある
              // スタックが正の値であるり、負の値に負けるパターン
              while (!empty($stack) && end($stack) > 0 && end($stack) < abs($asteroids[$i])) {
                  array_pop($stack);
              }

              //正の値と負の値が同点のパターン
              if (!empty($stack) && end($stack) == abs($asteroids[$i])) {
                  array_pop($stack);
              } else {
                  //空になってしまったパターンまたは値が負の値で会った時、衝突しないパターン
                  if (empty($stack) || end($stack) < 0) {
                      array_push($stack, $asteroids[$i]);
                  }
              }
          }
      }
      return $stack;
  }
}

// Example usage:
$solution = new Solution;
$asteroidseroids = [-5, -10, -5];
$result = $solution->asteroidCollision($asteroidseroids);
