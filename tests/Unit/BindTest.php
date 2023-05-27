<?php

use Illuminate\Support\Collection;

it('can bind a collection', function () {
    $result = \collect([1, 2, 3, 4, 5]);

    expect($result->gg())->toBeInstanceOf(Collection::class);
});
