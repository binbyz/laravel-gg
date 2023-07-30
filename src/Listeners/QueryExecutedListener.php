<?php

namespace Beaverlabs\LaravelGg\Listeners;

use Illuminate\Database\Events\QueryExecuted;

class QueryExecutedListener
{
    public function handle(QueryExecuted $event): void
    {
        \gg($event->sql, $event->bindings, $event->time);
    }
}
