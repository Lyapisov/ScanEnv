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
    public function getEnvAll():array
    {
        $env = new Dotenv();
        $env->load('.env');
        return $_ENV;
    }
}