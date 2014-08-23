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
 *     Open a Terminal and type $ php auto.php
 
 */
 
// This will be automatic to read logs, its in development.

// NOT READY YET CANT GET LOG BUFFER TO WORK in ?logbuffer of a game

// Load into memory (Array)
$dict = file('dict.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$sentence = "[SCRAMBLE] scrambled_word: banodbo";
echo "\n";
echo $sentence;

if (strpos($sentence, '[SCRAMBLE] scrambled_word:') !== false) 
{
    // Get the scrambled_word and trim it without spaces
    $scrambled_word = explode(':', $sentence);
    
    $scrambled_word = (isset($scrambled_word[1])) ? $scrambled_word[1] : false;
    if (!$scrambled_word) {
        echo "No scrambled_word\n";
        return;
    }
        
    $scrambled_word = str_replace(' ', '', strtolower($scrambled_word));
    
    $letters = count_chars($scrambled_word, 1);
    
    foreach ($dict as $word)
    {
        if ($letters == count_chars($word, 1))
            echo "\n$scrambled_word";
    }

}