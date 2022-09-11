<?php

namespace Withinboredom\Algorithms\Deque;

class Node
{
    public function __construct(public Node|null $previous, public Node|null $next, public mixed $value)
    {
    }

    public function setNext(Node $next): Node
    {
        $this->next = $next;
        return $this;
    }

    public function setPrevious(Node $previous): Node
    {
        $this->previous = $previous;
        return $this;
    }

    public function removeMeNext(): Node|null
    {
        $return = $this->next?->resetPrevious();
        $this->resetNext();
        return $return;
    }

    public function resetPrevious(): Node
    {
        $this->previous = null;
        return $this;
    }

    public function resetNext(): Node
    {
        $this->next = null;
        return $this;
    }

    public function removeMePrevious(): Node|null
    {
        $return = $this->previous?->resetNext();
        $this->resetPrevious();
        return $return;
    }
}

class LinkedList
{
    public Node|null $head = null;
    public Node|null $tail = null;

    /**
     * Append to the tail
     *
     * @param mixed $value
     * @return void
     */
    public function push(mixed $value): void
    {
        $this->tail =
            $this->tail?->setNext(new Node($this->tail, null, $value))->next
            ?? $this->head = new Node(null, null, $value);
    }

    /**
     * Get from the end of the array
     *
     * @return mixed
     */
    public function pop(): mixed
    {
        $return = $this->tail?->value ?? throw new \Exception();
        $this->tail = $this->tail->removeMePrevious();
        return $return;
    }

    /**
     * Prepend
     *
     * @return mixed
     */
    public function unshift(mixed $value): void
    {
        $this->head =
            $this->head?->setPrevious(new Node(null, $this->head, $value))->previous
            ?? $this->tail = new Node(null, null, $value);
    }

    /**
     * Get from the beginning of the array
     *
     * @return mixed
     */
    public function shift(): mixed
    {
        $return = $this->head?->value ?? throw new \Exception();
        $this->head = $this->head->removeMeNext();
        return $return;
    }
}