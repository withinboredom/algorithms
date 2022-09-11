<?php


use Withinboredom\Algorithms\Deque\CircularBuffer;
use Withinboredom\Algorithms\Deque\DoubleList;
use Withinboredom\Algorithms\Deque\LinkedList;

it('can push/pop', function () {
    $deque = new CircularBuffer(20);
    $deque->push(1);
    expect($deque->pop())->toBe(1);
    $deque = new LinkedList();
    $deque->push(1);
    expect($deque->pop())->toBe(1);
    $deque = new DoubleList();
    $deque->push(1);
    expect($deque->pop())->toBe(1);
});

it('can shift/unshift', function () {
    $deque = new CircularBuffer(20);
    $deque->unshift(1);
    expect($deque->shift())->toBe(1);
    $deque = new LinkedList();
    $deque->unshift(1);
    expect($deque->shift())->toBe(1);
    $deque = new DoubleList();
    $deque->unshift(1);
    expect($deque->shift())->toBe(1);
});

it('can unshift and pop', function () {
    $deque = new CircularBuffer(20);
    $deque->unshift(1);
    $deque->unshift(2);
    expect($deque->pop())->toBe(1);
    expect($deque->pop())->toBe(2);
    $deque = new LinkedList();
    $deque->unshift(1);
    $deque->unshift(2);
    expect($deque->pop())->toBe(1);
    expect($deque->pop())->toBe(2);
    $deque = new DoubleList();
    $deque->unshift(1);
    $deque->unshift(2);
    expect($deque->pop())->toBe(1);
    expect($deque->pop())->toBe(2);
});