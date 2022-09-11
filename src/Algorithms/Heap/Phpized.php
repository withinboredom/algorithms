<?php

namespace Withinboredom\Algorithms\Heap;

/**
 * An idiomatic PHP implementation of a heap.
 *
 * We are using a cursor here because we are utilizing the magic of sparse arrays!
 */
class Phpized
{
    private array $arr = [];
    private bool $dirty = false;

    public function __construct()
    {
    }

    public function insert(int $key, mixed $value): void
    {
        $this->arr[$key][] = $value;
        $this->dirty = true;
    }

    public function deleteKey(int $i): void {
        unset($this->arr[$i]);
    }

    public function removeMax(): mixed
    {
        if ($this->getSize() === 0) {
            throw new \Exception("Heap is empty");
        }

        if ($this->dirty) {
            krsort($this->arr);
            $this->dirty = false;
        }

        $current = key($this->arr);
        $x = &$this->arr[$current];
        $value = current($x);
        $next = next($x);
        if($next === false) {
            unset($this->arr[$current]);
        }

        return $value;
    }

    public function getSize(): int
    {
        return count($this->arr);
    }

    public function getMax(): mixed
    {
        if ($this->dirty) {
            krsort($this->arr);
            $this->dirty = false;
        }

        $next = current($this->arr);
        return $next[0];
    }
}