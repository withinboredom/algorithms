<?php

use PhpBench\Attributes\Iterations;
use PhpBench\Attributes\Revs;

class DequeBench {
    #[Revs( 100 )]
    #[Iterations( 100 )]
    public function benchDs() {
        $deque = new Ds\Deque;
        for ( $i = 0; $i < 250; $i ++ ) {
            $deque->push( $i );
        }
        for ( $i = 0; $i < 250; $i ++ ) {
            $deque->unshift( $i );
        }
        for ( $i = 0; $i < 250; $i ++ ) {
            $deque->pop();
        }
        for ( $i = 0; $i < 250; $i ++ ) {
            $deque->shift();
        }
    }

    #[Revs( 100 )]
    #[Iterations( 100 )]
    public function benchPhpized() {
        $deque = new \Withinboredom\Algorithms\Deque\CircularBuffer( 1000 );
        for ( $i = 0; $i < 250; $i ++ ) {
            $deque->push( $i );
        }
        for ( $i = 0; $i < 250; $i ++ ) {
            $deque->unshift( $i );
        }
        for ( $i = 0; $i < 250; $i ++ ) {
            $deque->pop();
        }
        for ( $i = 0; $i < 250; $i ++ ) {
            $deque->shift();
        }
    }

    #[Revs( 100 )]
    #[Iterations( 100 )]
    public function benchQueue() {
        $queue = new SplQueue();
        for ( $i = 0; $i < 500; $i ++ ) {
            $queue->enqueue( $i );
        }
        for ( $i = 0; $i < 500; $i ++ ) {
            $queue->dequeue();
        }
    }

    #[Revs( 100 )]
    #[Iterations( 100 )]
    public function benchStack() {
        $stack = new SplStack();
        for ( $i = 0; $i < 500; $i ++ ) {
            $stack->push( $i );
        }
        for ( $i = 0; $i < 500; $i ++ ) {
            $stack->pop();
        }
    }

    #[Revs( 100 )]
    #[Iterations( 100 )]
    public function benchNieve() {
        $deque = new \Withinboredom\Algorithms\Deque\Nieve();
        for ( $i = 0; $i < 250; $i ++ ) {
            $deque->push( "$i" );
        }
        for ( $i = 0; $i < 250; $i ++ ) {
            $deque->unshift( "$i" );
        }
        for ( $i = 0; $i < 250; $i ++ ) {
            $deque->pop();
        }
        for ( $i = 0; $i < 250; $i ++ ) {
            $deque->shift();
        }
    }
}