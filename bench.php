<?php

function one() {
    $start = microtime(true);
    for ($i = 0; $i < 100000; ++$i) {
        json_encode([
            'a' => 'a',
            'b' => 'b',
            'c' => 'c',
            'd' => 'd',
        ]);
    }
    return microtime(true) - $start;
}

function two() {
    $start = microtime(true);
    for ($i = 0; $i < 100000; ++$i) {
        http_build_query([
            'a' => 'a',
            'b' => 'b',
            'c' => 'c',
            'd' => 'd',
        ]);
    }
    return microtime(true) - $start;
}

$res = [];
for ($i = 0; $i < 1000; $i++) {
    $res[] = one();
}
echo array_sum($res) / count($res) . PHP_EOL;

$res = [];
for ($i = 0; $i < 1000; $i++) {
    $res[] = two();
}
echo array_sum($res) / count($res) . PHP_EOL;
