<?php
if (isset($argv[1])) {
    echo 'hi ' . "\033[0;36m" . $argv[1] . "\033[0;37m!\n";
} else {
    echo 'hi,'."\033[0;35m Anonymous! \n\033[0;37m" . "\n";
}
do {
    $handle = fopen("php://stdin", "r");
    $line = fgets($handle);
    $line=trim($line);
    if ("exit" == $line) {
        echo 'bue!' . "\n";
        die();
    } else {
        echo ' everyone can say ' ."\033[0;36m\"".$line."\"\n\033[0;37m But what about to buy an elephant?\n";
    }
} while (1);
