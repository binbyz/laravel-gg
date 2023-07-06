<?php

use Beaverlabs\Gg\Gg;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

it('can bind a collection', function () {
    $result = \collect([1, 2, 3, 4, 5])->gg();

    expect($result)->toBeInstanceOf(Collection::class);
});

it('can bind query builder', function () {
    $result = DB::table('users')->get()->gg();

    expect($result)->toBeInstanceOf(Builder::class);
});

it('just call gg function', function () {
    $result = gg('test');

    expect($result)->toBeInstanceOf(Gg::class);
});
