#!/usr/bin/php -q
<?php
$userName = (isset($argv[1])) ? $argv[1] : 'Anonymouse';
echo "\033[0;36m" . $userName . "\033[0;37m!" . ' Buy an elephant!' . "\n";
$handle = fopen("php://stdin", "r");
do {
    $line = fgets($handle);
    $line = trim($line);
    if("exit" == strtolower($line)){
        exit('bue!' . "\n");
    }
    echo $userName . ', everyone can say ' . "\033[0;35m\"" . $line . "\"\033[0;37m. But what about to buy an elephant?\n";
} while (1);
fclose($handle);
