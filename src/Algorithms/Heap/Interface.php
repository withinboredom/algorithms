<?php

namespace Withinboredom\Algorithms\Heap;

interface Heapish {
    public function insert(int $key, mixed $value): void;
    public function removeMax(): mixed;
    public function getSize(): int;
    public function getMax(): mixed;
}