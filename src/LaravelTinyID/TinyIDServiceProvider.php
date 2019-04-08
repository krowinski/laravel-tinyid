<?php
declare(strict_types=1);

namespace LaravelTinyID;


use Illuminate\Support\ServiceProvider;

class TinyIDServiceProvider extends ServiceProvider
{
    public const SERVICE_NAME = 'tinyID';

    public function boot(): void
    {
        $this->mergeConfigFrom($config = __DIR__ . '/config/tinyID.php', self::SERVICE_NAME);
        if ($this->app->runningInConsole()) {
            $this->publishes([$config => config_path(self::SERVICE_NAME . '.php')], self::SERVICE_NAME);
        }
    }

    public function register(): void
    {
        $this->app->singleton(
            self::SERVICE_NAME . '.factory', static function () {
            return new TinyIDFactory();
        }
        );
        $this->app->alias(self::SERVICE_NAME . '.factory', TinyIDFactory::class);
    }
}