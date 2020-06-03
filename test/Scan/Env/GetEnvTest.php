<?php

declare(strict_types=1);

namespace Test\Scan\Env;

use PHPUnit\Framework\TestCase;
use Scan\Env\MyEnv;

final class GetEnvTest extends TestCase
{
    public function testSuccessful():void
    {
        $env = new MyEnv();
        $value = "GLOBAL_FIRST";
        $response = $env->get($value);
        $this->assertEquals($response, 'smile');
    }

    public function testSuccessfulPassingLowerCaseQuery():void
    {
        $env = new MyEnv();
        $value = "global_second";
        $response = $env->get($value);
        $this->assertEquals($response, '1298_22');
    }

    public function testPassingEmptyQuery():void
    {
        $env = new MyEnv();
        $value = "";
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Query can not be blank!');
        $env->get($value);
    }

}