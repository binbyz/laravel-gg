<?php

namespace Beaverlabs\LaravelGg;

use Beaverlabs\Gg\Gg;
use Illuminate\Database\Query\Builder;
use Illuminate\Log\Events\MessageLogged;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class LaravelGgServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(Gg::class, static function () {
            return new Gg();
        });
    }

    public function boot()
    {
        $this->bindCollection()
            ->bindQueryBuilder()
            ->bindExceptionWatcher();
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

    protected function bindExceptionWatcher(): self
    {
        Event::listen(MessageLogged::class, static function (MessageLogged $logged) {
            if (\array_key_exists('exception', $logged->context) && $logged->context['exception'] instanceof \Throwable) {
                \gtrace($logged->context['exception']);
            }
        });

        return $this;
    }
}
