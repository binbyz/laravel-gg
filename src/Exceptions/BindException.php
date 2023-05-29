<?php

namespace Beaverlabs\LaravelGg\Exceptions;

class BindException extends \Exception
{
    public static function make(string $supportClass): self
    {
        return new self("{$supportClass} was bound before.");
    }
}
