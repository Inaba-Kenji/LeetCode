<?php
// You have a RecentCounter class which counts the number of recent requests within a certain time frame.

// Implement the RecentCounter class:

// RecentCounter() Initializes the counter with zero recent requests.
// int ping(int t) Adds a new request at time t, where t represents some time in milliseconds, and returns the number of requests that has happened in the past 3000 milliseconds (including the new request). Specifically, return the number of requests that have happened in the inclusive range [t - 3000, t].
// It is guaranteed that every call to ping uses a strictly larger value of t than the previous call.

class RecentCounter {
  private $queue;
  // リクエストのタイムスタンプを保持するキュー
  function __construct() {
    $this->queue = new SplQueue();
  }

  /**
   * @param Integer $t
   * @return Integer
   */
  function ping($t) {
    // 新しいリクエストをキューに追加
    $this->queue->enqueue($t);

    // 過去3000ミリ秒よりも前のものはキューから削除
    while (!$this->queue->isEmpty() && $this->queue->bottom() < $this->queue->top() - 3000) {
      $this->queue->dequeue();
    }
    // 過去3000ミリ秒内のリクエストの数を返す
    return $this->queue->count();
  }
}

$counter = new RecentCounter();
// リクエストを追加し、過去3000ミリ秒内のリクエストの数を取得
$result0 = $counter->ping("");     //
$result1 = $counter->ping(1);     // 1
$result2 = $counter->ping(100);   // 2
$result3 = $counter->ping(3001);  // 3
$result4 = $counter->ping(3002);  // 3

/**
* Your RecentCounter object will be instantiated and called as such:
* $obj = RecentCounter();
* $ret_1 = $obj->ping($t);
*/
