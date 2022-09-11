<?php

use Withinboredom\Algorithms\Heap\Phpized;

it('inserts and removes items in the order they are inserted', function () {
    $heap = new Phpized();
    for ($i = 0; $i < 1000; $i++) {
        $heap->insert(12, $i);
    }

    $heap->insert(15, 10);
    $heap->insert(0, 12);
    expect($heap->removeMax())->toBe(10);

    for ($i = 0; $i < 1000; $i++) {
        expect($heap->removeMax())->toBe($i);
    }

    expect($heap->removeMax())->toBe(12);

    expect($heap->getSize())->toBe(0);
    expect($heap->removeMax(...))->toThrow(\Exception::class);
});