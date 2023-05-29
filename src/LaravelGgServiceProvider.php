<?php

namespace Beaverlabs\LaravelGg;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
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
            \gg($this);

            return $this;
        });

        return $this;
    }
}
