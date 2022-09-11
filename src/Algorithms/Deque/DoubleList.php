<?php

namespace Withinboredom\Algorithms\Deque;

class DoubleList
{
    private array $front = [];
    private array $back = [];

    /**
     * Append
     *
     * @param mixed $value
     * @return void
     */
    public function push(mixed $value): void
    {
        $this->back[] = $value;
    }

    /**
     * prepend
     *
     * @param mixed $value
     * @return void
     */
    public function unshift(mixed $value): void
    {
        $this->front[] = $value;
    }

    /**
     * take from the back
     *
     * @return mixed
     */
    public function pop(): mixed
    {
        if (empty($this->back)) {
            // take the first item from the front and remove the item
            $return = reset($this->front);
            unset($this->front[key($this->front)]);
            return $return;
        }
        $return = end($this->back);
        unset($this->back[key($this->back)]);
        return $return;
    }

    /**
     * take from the front
     *
     * @return mixed
     */
    public function shift(): mixed
    {
        if (empty($this->front)) {
            // take the last item from the back and remove the item
            $return = reset($this->back);
            unset($this->back[key($this->back)]);
            return $return;
        }
        $return = end($this->front);
        unset($this->front[key($this->front)]);
        return $return;
    }
}