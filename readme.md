# PHP Unscramble

Author (Jesse Boyer/JREAM)[http://jream.com]

## Description

This is a simple exercise to unscramble words based on a dictionary.
It gets the ASCII code of the characters and compares to every dictionary entry.

Upon loading a file a massive amount of dictionary items are translated into an array in memory.
This is fairly quick without a database. Thoughts on using Redis for more speed or expanding this
are not the goal for now.

### Manual Usage

Open your terminal and run:

    $ php manual.php
    
All word options will be given since there are cases with words like `cloud` and `could` whivh the same ASCII values.
    
    
### Auto Usage

This is really intended for a game to autoamtically listen for a buffer coming from a log file. However the game itself
is not cooperating so this is on hold. 

    $ php auto.php