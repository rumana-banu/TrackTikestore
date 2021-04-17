<?php
$arr[0]['type'] = "console";
$arr[0]['price'] = 200;
$arr[1]['type'] = "TV";
$arr[1]['price'] = 100;
$arr[2]['type'] = "console";
$arr[2]['price'] = 500;

array_sort_by_column($arr,'price');

function array_sort_by_column(&$array, $col, $dir = SORT_ASC) {
    $sort_col = array();
    foreach ($array as $key=> $row) {
        $sort_col[$key] = $row[$col];
    }

    array_multisort($sort_col, $dir, $array);
    var_dump($array);
}


