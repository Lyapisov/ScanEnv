<?php

declare(strict_types=1);

namespace Test\Scan\Env;

use PHPUnit\Framework\TestCase;
use Scan\Env\MyEnv;

final class GetEnvTest extends TestCase
{
    public function testSuccessfulWithStringValue():void
    {
        $env = new MyEnv();
        $nameConst = "GLOBAL_FIRST";
        $response = $env->get($nameConst);
        $this->assertEquals($response, 'smile');
    }

    public function testSuccessfulWithIntValue():void
    {
        $env = new MyEnv();
        $nameConst = "GLOBAL_SECOND";
        $response = $env->get($nameConst);
        $this->assertEquals($response, '1298_22');
    }

    public function testSuccessfulPassingLowerCaseQuery():void
    {
        $env = new MyEnv();
        $nameConst = "global_first";
        $response = $env->get($nameConst);
        $this->assertEquals($response, 'smile');
    }

    public function testPassingEmptyQuery():void
    {
        $env = new MyEnv();
        $nameConst = "";
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Query can not be blank!');
        $env->get($nameConst);
    }
    public function testConstantsDoNotExist():void
    {
        $env = new MyEnv();
        $nameConst = "GLOBAL";
        $response = $env->get($nameConst);
        $this->assertEquals($response, null);
    }
}