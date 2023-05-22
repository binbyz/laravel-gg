<?php

namespace Beaverlabs\LaravelGG;

use Beaverlabs\LaravelGG\Exceptions\BindException;
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

        \gg('here#1');

        Collection::macro(self::MACRO_NAME, function () {
            \gg($this->items);

            return $this;
        });
    }
}
