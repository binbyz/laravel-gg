<?php

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

it('can bind a collection', function () {
    $result = \collect([1, 2, 3, 4, 5]);

    expect($result->gg())->toBeInstanceOf(Collection::class);
});

it('can bind query builder', function () {
    $result = DB::table('users')->get()->gg();

    expect($result)->toBeInstanceOf(Builder::class);
});
