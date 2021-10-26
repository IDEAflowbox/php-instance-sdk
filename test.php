#!/bin/php
<?php
ini_set( 'display_errors', 0);
error_reporting(0);

$total = 0;
$errors = 0;
$tests = [];
foreach(glob(__DIR__.'/examples/*.php') as $example) {
    if ($example !== __DIR__.'/examples/config.php') {
        $total++;
        $filename = explode("/", $example);

        exec('php '.$example.' > /dev/null 2>&1', $content, $code);
        $passed = $code === 0;
        $colorStart = $passed ? "" : "\e[1;37;41m";
        $colorEnd = $passed ? "" : "\e[0m";

        if (!$passed) {
            $errors++;
        }

        echo $colorStart.sprintf(
        "[%s] %s: %s",
            $passed ? "✓" : "x",
            $passed ? "PASSED" : "NOT PASSED",
            end($filename)
        ).$colorEnd.PHP_EOL;
    }
}

if ($errors) {
    echo "\e[1;34;40mThere were occurred {$errors} errors of ${total} tests.\e[0m".PHP_EOL;
} else {
    echo "\e[1;32;40mThere were no errors.\e[0m".PHP_EOL;
}

//system('clear');
//
//foreach ($tests as $test => $value) {
//    echo '[x] [Passed] '.$test.PHP_EOL;
//}
