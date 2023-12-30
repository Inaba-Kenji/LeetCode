<?php
// Given a string s and an integer k, return the maximum number of vowel letters in any substring of s with length k.

// Vowel letters in English are 'a', 'e', 'i', 'o', and 'u'.

class Solution {

  /**
   * スライディングウィンドウ技法を使用して

   * @param String $s
   * @param int $k
   * @return int
   */
  function maxVowels($s, $k) {
    $maxCount = $current = 0;
    $vowels = "aeiou";

    for ($i = 0; $i < strlen($s); $i++) {
      // ウィンドウサイズが $k を超えた場合、左端の文字をウィンドウから削除
      if ($i >= $k) {
        // 削除された文字が母音であれば、母音のカウントを減少
        if (strpos($vowels, $s[$i - $k]) !== false) {
          $current -= 1;
        }
      }

      // 現在の文字が母音であれば、母音のカウントを増加
      if (strpos($vowels, $s[$i]) !== false) {
        $current += 1;
      }

      $maxCount = max($maxCount, $current);
    }
    return $maxCount;
  }
}

$solution = new Solution;
$s = "abciiidef";
$k = 3;
$result = ($solution->maxVowels($s, $k));
echo $result;
