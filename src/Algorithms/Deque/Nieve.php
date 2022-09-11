<?php

namespace Withinboredom\Algorithms\Deque;

class Nieve
{
    private array $buffer = [];

    /**
     * Append to the end of the array
     *
     * @param mixed $value
     *
     * @return void
     */
    public function push(mixed $value): void
    {
        array_push($this->buffer, $value);
    }

    /**
     * Get from the end of the array
     * @return mixed
     */
    public function pop(): mixed
    {
        return array_pop($this->buffer);
    }

    /**
     * Get from the beginning of the array
     * @return mixed
     */
    public function shift(): mixed
    {
        return array_shift($this->buffer);
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
        array_unshift($this->buffer, $value);
    }
}