<?php
// Two strings are considered close if you can attain one from the other using the following operations:

//   Operation 1: Swap any two existing characters.
//   For example, abcde -> aecdb
//   Operation 2: Transform every occurrence of one existing character into another existing character, and do the same with the other character.
//   For example, aacabb -> bbcbaa (all a's turn into b's, and all b's turn into a's)
//   You can use the operations on either string as many times as necessary.

//   Given two strings, word1 and word2, return true if word1 and word2 are close, and false otherwise.

class Solution {

  /**
   * @param String $word1
   * @param String $word2
   * @return Boolean
   */
  function closeStrings($word1, $word2) {
    $count1 = array_count_values((str_split($word1)));
    $count2 = array_count_values((str_split($word2)));

    $keys1 = array_keys($count1);
    $keys2 = array_keys($count2);
    sort($keys1);
    sort($keys2);

    $values1 = array_values($count1);
    $values2 = array_values($count2);
    sort($values1);
    sort($values2);

    return $keys1 == $keys2 && $values1 == $values2;
  }
}

$solution = new Solution;
$word1 = "abbbzcf";
$word2 = "babzzcz";
var_dump($solution->closeStrings($word1, $word2));
