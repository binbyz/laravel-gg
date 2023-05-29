<?php

namespace Tests;

use Beaverlabs\LaravelGg\LaravelGgServiceProvider;
use Illuminate\Foundation\Testing\DatabaseMigrations;

abstract class TestCase extends \Illuminate\Foundation\Testing\TestCase
{
    use \Orchestra\Testbench\Concerns\CreatesApplication;
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        $this->app->register(LaravelGgServiceProvider::class);
    }
}
