<?php
declare(strict_types=1);

use LaravelTinyID\TinyIDFactory;

return [
    'default' => 'main',
    'connections' => [
        'main' => [
            TinyIDFactory::DICTIONARY => '2BjLhRduC6Tb8Q5cEk9oxnFaWUDpOlGAgwYzNre7tI4yqPvXm0KSV1fJs3ZiHM',
        ],

        'alternative' => [
            TinyIDFactory::DICTIONARY => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'
        ],
    ],
];