<?php
// You are given two strings word1 and word2. Merge the strings by adding letters in alternating order, starting with word1. If a string is longer than the other, append the additional letters onto the end of the merged string.

// Return the merged string.

class Solution {

  /**
   * @param String $word1
   * @param String $word2
   * @return String
   */
  function mergeAlternately(string $word1, string $word2): string {
    $length1 = strlen($word1);
    $length2 = strlen($word2);
    $maxLength = max($length1, $length2);

    $result = "";
    for ($i = 0; $i < $maxLength; $i++) {
      if (!empty($word1[$i])) {
        $result .= $word1[$i];
      }
      if (!empty($word2[$i])) {
        $result .= $word2[$i];
      }
    }
    return $result;
  }
}

// $solution = new Solution();
// $word1 = "abcd";
// $word2 = "pq";
// var_dump($solution->mergeAlternately($word1, $word2));
?>
