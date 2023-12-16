<?php
// There are n kids with candies. You are given an integer array candies, where each candies[i] represents the number of candies the ith kid has, and an integer extraCandies, denoting the number of extra candies that you have.

// Return a boolean array result of length n, where result[i] is true if, after giving the ith kid all the extraCandies, they will have the greatest number of candies among all the kids, or false otherwise.

// Note that multiple kids can have the greatest number of candies.

class Solution {

/**
 * @param int[] $candies
 * @param int $extraCandies
 * @return bool[]
 */
function kidsWithCandies(array $candies, $extraCandies): array {
  $max = max($candies);

  foreach ($candies as $key => $value) {
    $tmp = $candies[$key] + $extraCandies;
    $result[$key] = ($tmp >= $max) ? true : false;
  }

  return $result;
}
}

$solution = new Solution;
$candies = [12,1,12];
$extraCandies = 10;
var_dump($solution->kidsWithCandies($candies, $extraCandies));
