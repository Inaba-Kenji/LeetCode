<?php
// Given an array of characters chars, compress it using the following algorithm:

// Begin with an empty string s. For each group of consecutive repeating characters in chars:

// If the group's length is 1, append the character to s.
// Otherwise, append the character followed by the group's length.
// The compressed string s should not be returned separately, but instead, be stored in the input character array chars. Note that group lengths that are 10 or longer will be split into multiple characters in chars.

// After you are done modifying the input array, return the new length of the array.

// You must write an algorithm that uses only constant extra space.

class Solution {
  /**
   * @param array $chars
   * @return int
   */
  function compress(array &$chars): int {
      $indexAns = 0;  // 圧縮後の配列のインデックス
      $index = 0;     // 元の配列のインデックス
      $length = count($chars);  // 配列の長さ

      while ($index < $length) {
          $currentChar = $chars[$index];
          $count = 0;

          // 同じ文字が続く限りカウント
          while ($index < $length && $chars[$index] == $currentChar) {
              $index++;
              $count++;
          }

          // 圧縮結果を配列に格納(代入された後にインクリメントされる)
          $chars[$indexAns++] = $currentChar;

          // グループの長さが1でない場合、数字の文字列に変換して配列に格納
          if ($count !== 1) {
              $countChars = str_split((string)$count);
              foreach ($countChars as $c) {
                  $chars[$indexAns++] = $c;
              }
          }
      }

      // 圧縮後の配列の長さを返す
      return $indexAns;
  }
}

// Example usage:
$solution = new Solution();
$chars = ['a', 'a', 'b', 'b', 'c', 'c', 'c'];
$resultLength = $solution->compress($chars);

// 圧縮後の配列を表示
for ($i = 0; $i < $resultLength; $i++) {
  echo $chars[$i];
}
