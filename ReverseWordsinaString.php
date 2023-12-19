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
    $length = strlen($s);
    $words = [];
    $spaceCount = 0;
    $wordCount = 0;
    $result = "";

    for($i = 0; $i < $length; $i++) {
      if ($s[$i] == " ") {
        $spaceCount++;
      } else {
        // 単語が初めて出現した場合、$words[$spaceCount]を初期化
        if (!isset($words[$spaceCount])) {
          $words[$spaceCount] = '';
        }
        $words[$spaceCount] .= $s[$i];
      }
    }

    $reverseWords = array_reverse($words);
    $wordCount = count($reverseWords);
    foreach ($reverseWords as $key => $val) {
      $result .= $val;
      if ($wordCount - 1 > $key) {
        $result .= " ";
      }
    }
    return $result;
  }
}

$solution = new Solution;
$s = "the sky is blue";
var_dump($solution->reverseWords($s));
