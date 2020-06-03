<?php

declare(strict_types=1);

namespace Scan\Env;

use Exception;

/**
 * Class MyEnv
 * Класс для получения конкретной переменной
 */
final class MyEnv extends GetEnv
{

    public function get(string $query)
    {
        $this->getEnvAll();
        return $this->validateQuery($query);
    }
}