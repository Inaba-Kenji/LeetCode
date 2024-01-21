<?php
// In a linked list of size n, where n is even, the ith node (0-indexed) of the linked list is known as the twin of the (n-1-i)th node, if 0 <= i <= (n / 2) - 1.

// For example, if n = 4, then node 0 is the twin of node 3, and node 1 is the twin of node 2. These are the only nodes with twins for n = 4.
// The twin sum is defined as the sum of a node and its twin.

// Given the head of a linked list with even length, return the maximum twin sum of the linked list.

class ListNode {
  public $val = 0;
  public $next = null;
  function __construct($val = 0, $next = null) {
      $this->val = $val;
      $this->next = $next;
  }
}

class Solution {
  /**
   * @param ListNode $head
   * @return Integer
   */
  function pairSum($head) {
      $n=0;
      $aux=$head;

      // 単一方法リストの数をカウントする
      while($aux){
          $n++;
          $aux=$aux->next;
      }

      $hm=array();

      // twinの前半の値を取得する
      // indexを後半のtwinの値に設定してある
      for ($i = 0; $i < $n/2; $i++) {
          $hm[$n-1-$i]=$head->val;
          $head=$head->next;
      }

      // 初期値はtwinの後半からスタートするようにする
      // twinの合計を計算する
      for ($i; $i<$n;$i++){
          $hm[$i]=$hm[$i]+$head->val;
          $head=$head->next;
      }

      return max($hm);
  }
}

$solution = new Solution;
$head = new ListNode(5, new ListNode(4, new ListNode(2, new ListNode(1))));
$result = $solution->pairSum($head);
var_dump($result);
exit;
