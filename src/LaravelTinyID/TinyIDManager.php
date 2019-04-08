<?php
declare(strict_types=1);

namespace LaravelTinyID;

use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;
use TinyID\TinyID;

class TinyIDManager extends AbstractManager
{
    protected $factory;

    public function __construct(Repository $config, TinyIDFactory $factory)
    {
        parent::__construct($config);
        $this->factory = $factory;
    }

    public function getFactory(): TinyIDFactory
    {
        return $this->factory;
    }

    protected function createConnection(array $config): TinyID
    {
        return $this->factory->make($config);
    }

    protected function getConfigName(): string
    {
        return TinyIDServiceProvider::SERVICE_NAME;
    }
}