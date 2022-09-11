<?php

namespace Withinboredom\Algorithms\Heap;

/**
 * A basic priority heap implemented in C++-ish semantics
 */
class Reference
{
    private int $heapSize = 0;
    private array $arr = [];

    public function __construct(public readonly int $maxSize)
    {
    }

    public function getMax(): mixed
    {
        return $this->arr[0]['value'];
    }

    public function getSize(): int
    {
        return $this->heapSize;
    }

    public function insert(int $key, mixed $value): void
    {
        if ($this->heapSize === $this->maxSize) {
            throw new \Exception("Heap is full");
        }

        $i = $this->heapSize++;
        $this->arr[$i] = ['key' => $key, 'value' => $value];

        while ($i !== 0 && $this->arr[$this->parent($i)]['key'] < $this->arr[$i]['key']) {
            $this->swap($i, $this->parent($i));
            $i = $this->parent($i);
        }
    }

    private function parent(int $i): int
    {
        return (int)floor(($i - 1) / 2);
    }

    private function swap(int $first, int $second)
    {
        $temp = $this->arr[$first];
        $this->arr[$first] = $this->arr[$second];
        $this->arr[$second] = $temp;
    }

    public function deleteKey(int $i)
    {
        $this->increaseKey($i, PHP_INT_MAX);
        $this->removeMax();
    }

    public function increaseKey(int $i, int $newKey)
    {
        $this->arr[$i]['key'] = $newKey;

        while ($i !== 0 && $this->arr[$this->parent($i)]['key'] < $this->arr[$i]['key']) {
            $this->swap($i, $this->parent($i));
            $i = $this->parent($i);
        }
    }

    public function removeMax(): mixed
    {
        if ($this->heapSize <= 0) {
            throw new \Exception("Heap is empty");
        }
        if ($this->heapSize === 1) {
            $this->heapSize--;
            return $this->arr[0];
        }

        $root = $this->arr[0];
        $this->arr[0] = $this->arr[--$this->heapSize];
        $this->maxHeapify(0);

        return $root;
    }

    public function maxHeapify(int $i): void
    {
        $l = $this->leftChild($i);
        $r = $this->rightChild($i);
        $largest = $i;

        if ($l < $this->heapSize && $this->arr[$l]['key'] > $this->arr[$i]['key']) {
            $largest = $l;
        }

        if ($r < $this->heapSize && $this->arr[$r]['key'] > $this->arr[$largest]['key']) {
            $largest = $r;
        }

        if ($largest !== $i) {
            $this->swap($i, $largest);
            $this->maxHeapify($largest);
        }
    }

    private function leftChild(int $i): int
    {
        return 2 * $i + 1;
    }

    private function rightChild(int $i): int
    {
        return 2 * $i + 2;
    }
}