<?php

namespace Beaverlabs\LaravelGg;

use Illuminate\Database\Query\Builder;
use Illuminate\Log\Events\MessageLogged;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class LaravelGgServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->bindCollection()
            ->bindQueryBuilder();
    }

    public function boot()
    {
    }

    protected function bindCollection(): self
    {
        Collection::macro('gg', function () {
            \gg($this->items);

            return $this;
        });

        return $this;
    }

    protected function bindQueryBuilder(): self
    {
        Builder::macro('gg', function () {
            /** @var Builder $this */
            \gg($this->toSql());

            return $this;
        });

        return $this;
    }

    protected function bindEvent(): self
    {
        Event::listen(MessageLogged::class, static function (MessageLogged $logged) {
            if (\array_key_exists('exception', $logged->context) && $logged->context['exception'] instanceof \Throwable) {
                \gg($logged->context['exception']);
            }
        });
    }
}
