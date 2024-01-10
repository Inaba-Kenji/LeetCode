<?php
// Given an encoded string, return its decoded string.

// The encoding rule is: k[encoded_string], where the encoded_string inside the square brackets is being repeated exactly k times. Note that k is guaranteed to be a positive integer.

// You may assume that the input string is always valid; there are no extra white spaces, square brackets are well-formed, etc. Furthermore, you may assume that the original data does not contain any digits and that digits are only for those repeat numbers, k. For example, there will not be input like 3a or 2[4].

// The test cases are generated so that the length of the output will never exceed 105.

class Solution {

  /**
   * @param String $s
   * @return String
   */
  function decodeString($s) {
    $i = $num = 0;
    // "abc3[cd]xyz"のパターンに対応するため $stack = []ではない
    $stack = [""];

    while ($i < strlen($s)) {
      if (is_numeric($s[$i])) {
        // 数字が２桁の場合を想定して
        $num = $num * 10 + intval($s[$i]);
      } elseif ($s[$i] == "[") {
        // "["の次は文字が来るので数値をスタックに追加する
        // 文字が来た場合に連結しやすくするため
        array_push($stack, $num);
        $num = 0;
        array_push($stack, "");
      } elseif ($s[$i] == "]") {
        // 文字と数字で繰り返しの処理を実行
        // str2に連結しているのは括弧の中に括弧があるパターンに対応するため
        $str1 = array_pop($stack);
        $rep  = array_pop($stack);
        $str2  = array_pop($stack);
        array_push($stack, $str2 . str_repeat($str1, intval($rep)));
      } else {
        // 文字列が何文字でも対応できるように連結する
        $stack[count($stack) - 1] .= $s[$i];
      }
      $i++;
    }
    return implode("", $stack);
  }
}

// 使用例:
$solution = new Solution;
$input = "3[a2[c]]";
$result = $solution->decodeString($input);
echo $result;  // 出力: "accaccacc"
