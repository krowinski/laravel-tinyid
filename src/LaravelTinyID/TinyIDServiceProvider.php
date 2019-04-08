<?php
declare(strict_types=1);

namespace LaravelTinyID;


use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;
use LaravelTinyID\Facades\TinyID;

class TinyIDServiceProvider extends ServiceProvider
{
    public const SERVICE_NAME = 'tinyID';
    public const FACTORY_NAME = self::SERVICE_NAME . '.factory';
    public const CONNECTION_NAME = self::SERVICE_NAME . '.connection';

    public function boot(): void
    {
        $this->mergeConfigFrom($config = __DIR__ . '/../config/' . self::SERVICE_NAME . '.php', self::SERVICE_NAME);
        if ($this->app->runningInConsole()) {
            $this->publishes([$config => config_path(self::SERVICE_NAME . '.php')], self::SERVICE_NAME);
        }
    }

    public function register(): void
    {
        $this->app->singleton(
            self::FACTORY_NAME, static function () {
            return new TinyIDFactory();
        }
        );
        $this->app->alias(self::FACTORY_NAME, TinyIDFactory::class);

        $this->app->singleton(
            self::SERVICE_NAME, static function (Container $app) {
            return new TinyIDManager($app['config'], $app[self::FACTORY_NAME]);
        }
        );
        $this->app->alias(self::SERVICE_NAME, TinyIDFactory::class);

        $this->app->bind(
            self::CONNECTION_NAME, static function (Container $app) {
            return $app[self::SERVICE_NAME]->connection();
        }
        );
        $this->app->alias(self::CONNECTION_NAME, TinyID::class);
    }

    public function provides(): array
    {
        return [
            self::SERVICE_NAME,
            self::FACTORY_NAME,
            self::CONNECTION_NAME
        ];
    }
}