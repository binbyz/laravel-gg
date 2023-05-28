<?php

namespace Beaverlabs\LaravelGG;

use Beaverlabs\LaravelGG\Exceptions\BindException;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class LaravelGGServiceProvider extends ServiceProvider
{
    const MACRO_NAME = 'gg';

    /**
     * @throws BindException
     */
    public function register()
    {
        $this->bindCollection();
        $this->bindQueryBuilder();
    }

    public function boot()
    {
    }

    /**
     * @throws BindException
     */
    private function bindCollection()
    {
        if (Collection::hasMacro('gg')) {
            throw BindException::make(Collection::class);
        }

        Collection::macro(self::MACRO_NAME, function () {
            \gg($this->items);

            return $this;
        });
    }

    /**
     * @throws BindException
     */
    private function bindQueryBuilder()
    {
        if (Builder::hasMacro('gg')) {
            throw BindException::make(Builder::class);
        }

        Builder::macro(self::MACRO_NAME, function () {
            \gg($this);

            return $this;
        });
    }
}
