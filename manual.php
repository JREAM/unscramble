<?php
/**
 * Unscramble
 *
 * @author Jesse Boyer <hello@jream.com>
 * @copyright Copyright (c) 2014, Jese Boyer
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version 0.1
 *
 * @usage
 *     Open a Terminal and type $ php manual.php

 */

// Load Dictionary Into Memory (Array)
$dict = file('dict.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// To Exit Ctrl + C (Default Terminal)
while (true) {

    // User Input
    echo "Enter your word: ";
    $handle = fopen ("php://stdin","r");
    $scrambled_word = trim(fgets($handle));

    // Friendly Text
    echo "Your Word: [$scrambled_word]\n";
    echo "[Searching]...\n";

    // Only load this once, not every loop
    $letters = count_chars($scrambled_word, 1);

    $match = 0;
    foreach ($dict as $word)
    {
        if ($letters == count_chars($word, 1)) {
            echo "$word\n";
            $match++;
        }
    }
    if ($match == 0) {
        echo "[Sorry there were no matches..]\n\n";
    } else {
        echo "\n\n";
    }

}