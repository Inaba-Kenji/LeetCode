<?php
// Given a 0-indexed n x n integer matrix grid, return the number of pairs (ri, cj) such that row ri and column cj are equal.

// A row and column pair is considered equal if they contain the same elements in the same order (i.e., an equal array).

class Solution {
    /**
     * @param array $grid
     * @return int
     */
    function equalPairs($grid) {
        $n = count($grid);
        $count = 0;
        $mapRows = [];

        for ($r = 0; $r < $n; $r++) {
            $row = $grid[$r];
            $row = implode(",", $row);
            $mapRows[$row] = 1 + ($mapRows[$row] ?? 0);
        }

        for ($c = 0; $c < $n; $c++) {
            $col = array_column($grid, $c);
            $col = implode(",", $col);
            $count += $mapRows[$col] ?? 0;
        }

        return $count;
    }
}

$solution = new Solution;
$grid = [[3,2,1],[1,7,6],[2,7,7]];
$result = $solution->equalPairs($grid);
echo $result;
