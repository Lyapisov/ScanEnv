<?php

declare(strict_types=1);

namespace Scan\Env;

use Symfony\Component\Dotenv\Dotenv;

/**
 * Class GetEnv
 * Класс для парсинга .env файла
 */
class GetEnv
{
    public function getEnvAll():void
    {
        $env = new Dotenv();
        $env->load('.env');
    }

    public function validateQuery(string $query)
    {
        $query = strtoupper($query);
        if (!$query) {
            return null;
        }
        return $_ENV[$query];
    }
}