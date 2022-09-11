<?php

use PhpBench\Attributes\Iterations;
use PhpBench\Attributes\Revs;

class DequeBench
{
    const NUM_ITEMS = 1000;
    
    #[Revs(100)]
    #[Iterations(100)]
    public function benchDs()
    {
        $deque = new Ds\Deque;
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->push($i);
        }
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->unshift($i);
        }
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->pop();
        }
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->shift();
        }
    }

    #[Revs(100)]
    #[Iterations(100)]
    public function benchCircularBuffer()
    {
        $deque = new \Withinboredom\Algorithms\Deque\CircularBuffer(self::NUM_ITEMS);
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->push($i);
        }
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->unshift($i);
        }
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->pop();
        }
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->shift();
        }
    }

    #[Revs(100)]
    #[Iterations(100)]
    public function benchQueue()
    {
        $queue = new SplQueue();
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $queue->push($i);
        }
        for($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $queue->unshift($i);
        }
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $queue->pop();
        }
        for($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $queue->shift();
        }
    }

    #[Revs(100)]
    #[Iterations(100)]
    public function benchStack()
    {
        $stack = new SplStack();
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $stack->push($i);
        }
        for($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $stack->unshift($i);
        }
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $stack->pop();
        }
        for($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $stack->shift();
        }
    }

    #[Revs(100)]
    #[Iterations(100)]
    public function benchLinkedList()
    {
        $deque = new \Withinboredom\Algorithms\Deque\LinkedList();
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->push("$i");
        }
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->unshift("$i");
        }
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->pop();
        }
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->shift();
        }
    }

    #[Revs(100)]
    #[Iterations(100)]
    public function benchDoubleListBest()
    {
        $deque = new \Withinboredom\Algorithms\Deque\DoubleList();
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->push("$i");
        }
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->unshift("$i");
        }
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->shift();
        }
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->pop();
        }
    }

    #[Revs(100)]
    #[Iterations(100)]
    public function benchDoubleListWorst()
    {
        $deque = new \Withinboredom\Algorithms\Deque\DoubleList();
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->push("$i");
        }
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->unshift("$i");
        }
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->pop();
        }
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->shift();
        }
    }

    #[Revs(100)]
    #[Iterations(100)]
    public function benchNieve()
    {
        $deque = new \Withinboredom\Algorithms\Deque\Nieve();
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->push("$i");
        }
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->unshift("$i");
        }
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->pop();
        }
        for ($i = 0; $i < self::NUM_ITEMS / 2; $i++) {
            $deque->shift();
        }
    }
}