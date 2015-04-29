#!/usr/bin/php5
<?php
if (isset($argv[1])) {
    $userName= $argv[1];
} else {
    $userName = 'Anonymouse';
}
echo "\033[0;36m" .$userName. "\033[0;37m!".' Buy an elephant!'."\n";
$handle = fopen("php://stdin", "r");
do {
    $line = fgets($handle);
    $line=trim($line);
    if ("exit" == strtolower($line)) {
        echo 'bue!' . "\n";
        exit();
    } else {
        echo $userName.', everyone can say ' ."\033[0;35m\"".$line."\"\033[0;37m. But what about to buy an elephant?\n";
    }
} while (1);
$handle = fclose("php://stdin");
