<?php

declare(strict_types=1);

namespace Scan\Env;

use Webmozart\Assert\Assert;

/**
 * Class MyEnv
 * Класс для получения конкретной переменной
 */
final class MyEnv
{
    private array $envs=[];
    /**
     * MyEnv constructor.
     */
    public function __construct()
    {
        $envAll = new GetEnv();
        $this->envs=$envAll->getEnvAll();
    }

    public function get(string $query)
    {
        Assert::notEmpty($query, 'Query can not be blank!');
        $query = strtoupper($query);
        return $this->envs[$query] ?? null;
    }
}