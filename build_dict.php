<?php

$original = file('dict.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$new_file = 'dict_' . time() . '.txt';

// Remove Duplicates
$original = array_unique($original);

// Order it
sort($original);

// Create Resource
$f = fopen($new_file, 'w');

// Add the word into the file
foreach ($original as $word) {
    fwrite($f, strtolower(trim($word)) . "\n");
}
fclose($f);

echo "\nNew dictionary $new_file generated.";
die;