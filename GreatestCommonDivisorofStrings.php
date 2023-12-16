<?php
// For two strings s and t, we say "t divides s" if and only if s = t + ... + t (i.e., t is concatenated with itself one or more times).

// Given two strings str1 and str2, return the largest string x such that x divides both str1 and str2.

class Solution {

  /**
   * @param String $str1
   * @param String $str2
   * @return String
   */
  function gcdOfStrings(string $str1, string $str2): string {
    // $str2がn回繰り返されて$str1になるということは,前後にstr2を追加しても同時になるはずだから
    // ならない場合は条件が成立しないパターン
    if ($str1 . $str2 !== $str2 . $str1) {
      return '';
    }

    $gcdLength = $this->gcd(strlen($str1), strlen($str2));

    return substr($str1, 0, $gcdLength);
  }

  // 最大公約を見つける関数
  function gcd(int $a, int $b): int{
    while ($b !== 0) {
      $temp = $b;
      $b = $a % $b;
      $a = $temp;
    }
    return $a;
  }
}

$solution = new Solution();
$word1 = "LEET";
$word2 = "CODE";
var_dump($solution->gcdOfStrings($word1, $word2));
