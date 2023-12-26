<?php

// Given two strings s and t, return true if s is a subsequence of t, or false otherwise.

// A subsequence of a string is a new string that is formed from the original string by deleting some (can be none) of the characters without disturbing the relative positions of the remaining characters. (i.e., "ace" is a subsequence of "abcde" while "aec" is not).

class Solution {

  /**
   * @param String $s
   * @param String $t
   * @return Boolean
   */
  function isSubsequence($s, $t) {
    // ポインターの初期値
    $i = 0;
    $j = 0;

    while ($i < strlen($s) && $j < strlen($t)) {
      if ($s[$i] == $t[$j]) {
        $i++;
      }
      $j++;
    }

    return $i == strlen($s);
  }
}

$solution = new Solution;
$s = "abc";
$t = "ahbgdc";
var_dump($solution->isSubsequence($s, $t));
