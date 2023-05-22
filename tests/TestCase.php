<?php

namespace Tests;

use Beaverlabs\LaravelGG\LaravelGGServiceProvider;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelGGServiceProvider::class,
        ];
    }
}
