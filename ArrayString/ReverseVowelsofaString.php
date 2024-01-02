<?php
// Given a string s, reverse only all the vowels in the string and return it.
// The vowels are 'a', 'e', 'i', 'o', and 'u', and they can appear in both lower and upper cases, more than once.

class Solution {

  /**
   * @param String $s
   * @return String
   */
  function reverseVowels($s) {
    $length = strlen($s);
    $vowels = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
    $keys = [];
    $values = [];

    for($i = 0; $i < $length; $i++) {
      if (in_array($s[$i], $vowels)) {
        $keys[] = $i;
        $values[] = $s[$i];
      }
    }

    $reserveValues = array_reverse($values);
    foreach ($keys as $key => $val) {
      $s[$val] = $reserveValues[$key];
    }
    return $s;
  }
}

// $solution = new Solution;
// $s = "leetcode";
// var_dump($solution->reverseVowels($s));
