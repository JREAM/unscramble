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

// This is hackish code for now. Refactor if i get time.

require 'vendor/tail.php';

$auto = new Auto();
$auto->setFile('C:\Program Files (x86)\Continuuum\logs\session.log');
$auto->setLines(1);
$auto->setDict(file('dict.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES));
$auto->run();

class Auto
{
    private $_pause;
    private $_file = null;
    private $_lines = 10;
    private $_dict = [];

    public function setDict($dict) {
        $this->_dict = $dict;
    }

    public function setFile($file) {
        $this->_file = $file;
    }

    public function setLines($lines) {
        $this->_lines = $lines;
    }

    private function _validate()
    {
        if (!is_file($this->_file)) {
            die("This is not a file: " . $this->_file);
        }
    }

    public function run()
    {
        while (!$this->_pause) {
            $this->_readLog();
        }
    }

    private function _readLog()
    {
        if (!$lines = get_lines($this->_file, $this->_lines)) {
            die("Can't be gettin dem lines from da file! ".$this->_file."\n");
        }

        foreach ($lines as $line)
        {
            if (strpos($line, '[SCRAMBLE]') !== false) {
                $this->_unscramble($line);
            }
        }
    }


    private function _unscramble($sentence)
    {
        $this->_pause = true;

        // Get the scrambled_word and trim it without spaces
        $scrambled_word = explode(':', $sentence);

        $scrambled_word = (isset($scrambled_word[1])) ? $scrambled_word[1] : false;

        if (!$scrambled_word) {
            echo "No scrambled_word\n";
            return;
        }

        $scrambled_word = str_replace(' ', '', strtolower($scrambled_word));
        $scrambled_word = trim($scrambled_word);
        $letters = count_chars($scrambled_word, 1);

        echo "Unscrambling: $scrambled_word\n";

        $match = 0;
        foreach ($this->_dict as $word)
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

        $this->_pause = false;
        $this->run();
    }

}

// Ad Hoc





