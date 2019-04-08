<?php
declare(strict_types=1);

namespace LaravelTinyID;


use Illuminate\Support\Facades\Facade;

/**
 * @method static string encode(string $value) Encode value to generate a hash.
 * @method static string decode(string $value) Decode a hash to the original value.
 */
class TinyID extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return TinyIDServiceProvider::SERVICE_NAME;
    }
}