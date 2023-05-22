<?php

namespace Beaverlabs\LaravelGG\Tests;

use Beaverlabs\LaravelGG\LaravelGGServiceProvider;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelGGServiceProvider::class
        ];
    }

    public function createApplication()
    {
    }
}
