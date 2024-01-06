<?php
// You are given a string s, which contains stars *.

// In one operation, you can:

// Choose a star in s.
// Remove the closest non-star character to its left, as well as remove the star itself.
// Return the string after all stars have been removed.

// Note:

// The input will be generated such that the operation is always possible.
// It can be shown that the resulting string will always be unique.

class Solution {
  /**
   * @param String $s
   * @return String
   */
  function removeStars($s) {
    $stack = [];

    for ($i = 0; $i < strlen($s); $i++) {
      if ($s[$i] == '*' && !empty($stack)) {
        array_pop($stack);
      } else {
        array_push($stack, $s[$i]);
      }
    }

    return implode("", $stack);
  }
}

$solution = new Solution;
$inputString = "leet**cod*e";
$outputString = $solution->removeStars($inputString);
echo $outputString;
