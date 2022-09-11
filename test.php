<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/Algorithms/Deque/DoubleList.php';

$deque = new \Withinboredom\Algorithms\Deque\DoubleList();
//for ($i = 0; $i < 250; $i++) {
$deque->push("1");
//}
//for ($i = 0; $i < 250; $i++) {
$deque->unshift("2");
//}
//for ($i = 0; $i < 250; $i++) {
//}
//for ($i = 0; $i < 250; $i++) {
$deque->pop();
$deque->shift();
//}