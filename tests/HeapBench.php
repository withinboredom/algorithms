<?php

namespace Withinboredom\Algorithms\Heap;

use PhpBench\Attributes\Iterations;
use PhpBench\Attributes\Revs;

const REVS=100;
const ITERATIONS=100;

class HeapBench {
    #[Revs(REVS)]
    #[Iterations(ITERATIONS)]
    public function benchReference(): void {
        $heap = new Reference(1000);
        for ($i = 0; $i < 1000; $i++) {
            $heap->insert(rand(), $i);
        }

        for ($i = 0; $i < 1000; $i++) {
            $heap->removeMax();
        }
    }
/*
    #[Revs(REVS)]
    #[Iterations(ITERATIONS)]
    public function benchReferenceConsq(): void {
        $heap = new Reference(1000);
        for ($i = 0; $i < 1000; $i++) {
            $heap->insert(random_int(0, 1000), $i);
            $heap->removeMax();
        }
    }
*/
    #[Revs(REVS)]
    #[Iterations(ITERATIONS)]
    public function benchSpl(): void {
        $heap = new \SplPriorityQueue();
        for($i = 0; $i< 10000; $i++ ){
            $heap->insert($i, rand());
        }

        for($i = 0; $i < 10000; $i++) {
            $heap->extract();
        }
    }

    #[Revs(REVS)]
    #[Iterations(ITERATIONS)]
    public function benchPhpized(): void {
        $heap = new Phpized();
        for ($i = 0; $i < 10000; $i++) {
            $heap->insert(rand(), $i);
        }

        for ($i = 0; $i < 10000; $i++) {
            $heap->removeMax();
        }
    }
/*
    #[Revs(REVS)]
    #[Iterations(ITERATIONS)]
    public function benchPhpizedConsq(): void {
        $heap = new Phpized();
        for ($i = 0; $i < 1000; $i++) {
            $heap->insert(random_int(0, 1000), $i);
            $heap->removeMax();
        }
    }
*/
}