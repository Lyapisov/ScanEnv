<?php

declare(strict_types=1);

namespace Test\Scan\Env;

use PHPUnit\Framework\TestCase;
use Scan\Env\MyEnv;

final class GetEnvTest extends TestCase
{
    public function testSuccessfulWithString():void
    {
        $env = new MyEnv();
        $value = "GLOBAL_FIRST";
        $response = $env->get($value);
        $this->assertEquals($response, 'smile');
    }

    public function testSuccessfulWithInt():void
    {
        $env = new MyEnv();
        $value = "GLOBAL_SECONd";
        $response = $env->get($value);
        $this->assertEquals($response, '1298_22');
    }

    public function testWithoutValue():void
    {
        $env = new MyEnv();
        $value = "";
        $response = $env->get($value);
        $this->assertEquals($response, null);
    }

//    public function testIncorrectValue():void
//    {
//        $env = new MyEnv();
//        $value = "194";
//        $response = $env->get($value);
//        $this->assertEquals($response, null);
//    }
}