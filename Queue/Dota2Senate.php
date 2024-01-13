<?php
// In the world of Dota2, there are two parties: the Radiant and the Dire.

// The Dota2 senate consists of senators coming from two parties. Now the Senate wants to decide on a change in the Dota2 game. The voting for this change is a round-based procedure. In each round, each senator can exercise one of the two rights:

// Ban one senator's right: A senator can make another senator lose all his rights in this and all the following rounds.
// Announce the victory: If this senator found the senators who still have rights to vote are all from the same party, he can announce the victory and decide on the change in the game.
// Given a string senate representing each senator's party belonging. The character 'R' and 'D' represent the Radiant party and the Dire party. Then if there are n senators, the size of the given string will be n.

// The round-based procedure starts from the first senator to the last senator in the given order. This procedure will last until the end of voting. All the senators who have lost their rights will be skipped during the procedure.

// Suppose every senator is smart enough and will play the best strategy for his own party. Predict which party will finally announce the victory and change the Dota2 game. The output should be "Radiant" or "Dire".

class Solution {

  /**
   * @param String $senate
   * @return String
   */
  function predictPartyVictory($senate) {
    $rad = new SplQueue;
    $dir = new SplQueue;
    $n = strlen($senate);

    for ($i = 0; $i < $n; $i++) {
      if ($senate[$i] == "R") {
        $rad->enqueue($i);
      } else {
        $dir->enqueue($i);
      }
    }

    while (!$rad->isEmpty() && !$dir->isEmpty()) {
      if ($rad->bottom() < $dir->bottom()) {
        $rad->enqueue($n++);
      } else {
        $dir->enqueue($n++);
      }
      $rad->dequeue();
      $dir->dequeue();
    }

    return ($rad->isEmpty()) ? "Dire" : "Radiant";
  }
}

$solution = new Solution;
$senate = "RDDDRDRRDR";
$result = $solution->predictPartyVictory($senate);
var_dump($result);

// なぜ勝者が列の最後尾に？
// 投票は双方が最も最適な戦略を実行するように行われるので、すでに投票した議員はそのラウンドでは相手チームにとって問題にならない。
// つまり、すでに動いた議員を排除するのではなく、次に投票権を持つ議員を排除することが、各チームにとって最善の策となる。
// 投票した議員を最後に配置すればよいので、これはキュー方式と完璧に連動する。

// 勝利の宣言をするには同じチームの人がだけが残らないとダメだから、すでに投票した人は後回しで相手の一番投票権が近い奴と勝負することが最善策だと考えられる
