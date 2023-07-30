<?php

namespace Beaverlabs\LaravelGg;

use Beaverlabs\LaravelGg\Listeners\QueryExecutedListener;
use Illuminate\Database\Events\QueryExecuted;

class EventServiceProvider extends \Illuminate\Foundation\Support\Providers\EventServiceProvider
{
    protected $listen = [
        QueryExecuted::class => [
            QueryExecutedListener::class,
        ],
    ];
}
