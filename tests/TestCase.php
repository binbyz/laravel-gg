<?php

namespace Beaverlabs\LaravelGG\Tests;

use Beaverlabs\LaravelGG\Exceptions\BindException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestCase extends \PHPUnit\Framework\TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    /**
     * @throws BindException
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->app = new \Illuminate\Foundation\Application();
        $this->provider = new \Beaverlabs\LaravelGG\LaravelGGServiceProvider($this->app);
        $this->provider->register();
    }
}
