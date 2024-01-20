<?php
// Given the head of a singly linked list, reverse the list, and return the reversed list.

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */

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
   * // 単一方法リストの次の値を一つ前の値にすることによっt、逆向きのリストを作成する
   *
   * @param ListNode $head
   * @return ListNode
   */
  function reverseList($head) {
    $nextNode = null;
    $prevNode = null;

    while ($head) {
      $nextNode = $head->next;
      $head->next = $prevNode;
      $prevNode = $head;
      $head = $nextNode;
    }

    return $prevNode;
  }
}

$solution = new Solution;
$head = new ListNode(1, new ListNode(2, new ListNode(3, new ListNode(4, new ListNode(5)))));

$result = $solution->reverseList($head);
while ($result) {
  var_dump($result->val);
  $result = $result->next;
}
