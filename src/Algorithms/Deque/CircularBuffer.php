<?php

namespace Withinboredom\Algorithms\Deque;

class CircularBuffer
{
    private array $buffer = [];
    private int $head = -1;
    private int $tail = 0;

    public function __construct(private int $size)
    {
    }

    /**
     * Append to the end of the array
     *
     * @param mixed $value
     *
     * @return void
     */
    public function push(mixed $value): void
    {
        if ($this->isFull()) {
            throw new \Exception();
        }

        if ($this->head === -1) {
            $this->head = 0;
            $this->tail = 0;
        } elseif ($this->tail === $this->size - 1) {
            $this->tail = 0;
        } else {
            $this->tail += 1;
        }
        $this->buffer[$this->tail] = $value;
    }

    public function isFull(): bool
    {
        return ($this->head === 0 && $this->tail === $this->size - 1) || $this->head === $this->tail + 1;
    }

    /**
     * Get from the end of the array
     * @return mixed
     */
    public function pop(): mixed
    {
        if ($this->isEmpty()) {
            throw new \Exception();
        }

        $return = $this->buffer[$this->tail];

        if ($this->head === $this->tail) {
            $this->head -= 1;
            $this->tail -= 1;
        } elseif ($this->tail === 0) {
            $this->tail = $this->size - 1;
        } else {
            $this->tail -= 1;
        }

        return $return;
    }

    public function isEmpty(): bool
    {
        return $this->head === -1;
    }

    /**
     * Get from the beginning of the array
     * @return mixed
     */
    public function shift(): mixed
    {
        if ($this->isEmpty()) {
            throw new \Exception();
        }

        $return = $this->buffer[$this->head];

        if ($this->head === $this->tail) {
            $this->head -= 1;
            $this->tail -= 1;
        } elseif ($this->head === $this->size - 1) {
            $this->head = 0;
        } else {
            $this->head += 1;
        }

        return $return;
    }

    /**
     * Append to the beginning of the array
     *
     * @param mixed $value
     *
     * @return void
     */
    public function unshift(mixed $value): void
    {
        if ($this->isFull()) {
            throw new \Exception();
        }

        if ($this->head === -1) {
            $this->head = 0;
            $this->tail = 0;
        } elseif ($this->head === 0) {
            $this->head = $this->size - 1;
        } else {
            $this->head -= 1;
        }
        $this->buffer[$this->head] = $value;
    }
}