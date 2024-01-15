<?php
// You are given the head of a linked list. Delete the middle node, and return the head of the modified linked list.

// The middle node of a linked list of size n is the ⌊n / 2⌋th node from the start using 0-based indexing, where ⌊x⌋ denotes the largest integer less than or equal to x.

// For n = 1, 2, 3, 4, and 5, the middle nodes are 0, 1, 1, 2, and 2, respectively.


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
   * @return ListNode
   */
  function deleteMiddle($head) {
    // 空のリストまたはノードが1つだけの場合は変更なし
    if ($head === null || $head->next === null) {
      return null;
    }

    //slowは1,2,3と進んでいく(slowが中央を指すことになる)
    $slow = $head;
    //fastは倍の2,4,6と進んでいく
    //そのためslowの値が丁度半分の値を指している
    $fast = $head;
    //半分の一つ前のListNode型のオブジェクトを保持
    $prev = null;

    //偶数の時の対応のため$fast->next !== nullを確認する
    while ($fast !== null && $fast->next !== null) {
      $prev = $slow;
      $slow = $slow->next;
      $fast = $fast->next->next;
    }

    // 中央のノードを削除
    $prev->next = $slow->next;

    return $head;
  }
}

$solution = new Solution;
$head = new ListNode(1, new ListNode(2, new ListNode(3, new ListNode(4, new ListNode(5)))));

$result = $solution->deleteMiddleNode($head);
var_dump($result);
exit;
