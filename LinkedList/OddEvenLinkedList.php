<?php
// Given the head of a singly linked list, group all the nodes with odd indices together followed by the nodes with even indices, and return the reordered list.

// The first node is considered odd, and the second node is even, and so on.

// Note that the relative order inside both the even and odd groups should remain as it was in the input.

// You must solve the problem in O(1) extra space complexity and O(n) time complexity.


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
  function oddEvenList($head) {
    // 空のリストまたはノードが1つだけの場合は変更なし
    if ($head === null) {
      return $head;
    }

    $odd = $head;
    $even = $head->next;
    $evenHead = $even;

    // ノードの数が３つ以上ある場合から判定を始める
    // ノードが２つの場合は判定をしなくてもよいため
    while ($even !== null && $even->next !== null) {
      $odd->next = $odd->next->next;
      $even->next = $even->next->next;
      $odd = $odd->next;
      $even = $even->next;
    }
    $odd->next = $evenHead;
    return $head;
  }
}

$solution = new Solution;
$head = new ListNode(1, new ListNode(2, new ListNode(3, new ListNode(4, new ListNode(5)))));

$result = $solution->oddEvenList($head);
var_dump($result);
exit;
