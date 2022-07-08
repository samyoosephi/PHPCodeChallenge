<?php

function transform($item) {
    $name = ucwords(strtolower($item['name']));
    $bdate = date_create($item['bdate']);
    $now = date_create('now');
    $live = date_diff($bdate, $now);

    return [
        'bdate' => $item['bdate'],
        'name' => $name,
        'age' => $live->format('%Y'),
    ];
}

$file = file_get_contents('students.json');
$array = json_decode($file, true);

$ids = array_column($array, 'id');
$new = array_combine($ids, array_map('transform', $array));
$json = json_encode($new);
file_put_contents('students_fixed.json', $json);

print_r($new);
