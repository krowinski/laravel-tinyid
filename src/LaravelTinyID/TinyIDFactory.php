<?php
declare(strict_types=1);

namespace LaravelTinyID;

use Illuminate\Support\Arr;
use TinyID\TinyID;

class TinyIDFactory
{
    public const DICTIONARY = 'dictionary';

    public function make(array $config): TinyID
    {
        return $this->getClient($this->getConfig($config));
    }

    protected function getConfig(array $config): array
    {
        return [
            self::DICTIONARY => Arr::get(
                $config,
                self::DICTIONARY,
                '2BjLhRduC6Tb8Q5cEk9oxnFaWUDpOlGAgwYzNre7tI4yqPvXm0KSV1fJs3ZiHM'
            )
        ];
    }

    protected function getClient(array $config): TinyID
    {
        return new TinyID($config[self::DICTIONARY]);
    }
}