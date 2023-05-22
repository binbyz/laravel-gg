<?php

test('Collection, gg macro', function () {
    $collection = collect([1, 2, 3]);

    $collection->gg();

    expect($collection)->toBeTrue();
});

