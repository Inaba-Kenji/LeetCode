<?php
// Given an input string s, reverse the order of the words.

// A word is defined as a sequence of non-space characters. The words in s will be separated by at least one space.

// Return a string of the words in reverse order concatenated by a single space.

// Note that s may contain leading or trailing spaces or multiple spaces between two words. The returned string should only have a single space separating the words. Do not include any extra spaces.

class Solution {
  /**
   * @param String $s
   * @return String
   */
  function reverseWords($s) {
    $result = array_diff(explode(' ', trim($s)), ['']);
    $result = array_reverse($result);
    return implode(" ", $result);
  }
}

$solution = new Solution;
$s = "a good   example";
var_dump($solution->reverseWords($s));
