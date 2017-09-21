<?php

namespace Solis\Breaker\Tests;

use Solis\Breaker\StackInfo;

use PHPUnit\Framework\TestCase;
use Solis\Breaker\Tests\Fixtures\Dummy\DummyStack;

class StackInfoTest extends TestCase
{

    /**
     * @var StackInfo
     */
    private $stackInfo;

    private $data;

    public function setUp()
    {
        $this->data      = (new DummyStack())->getStack();
        $this->stackInfo = new StackInfo($this->data);
    }

    public function testCanGetClassNameFromLastStack()
    {
        $name = $this->stackInfo->getClassNameFromLastStack();
        $this->assertEquals('class_3', $name, 'Can\'t get class name from last stack entry');
    }

    public function testCanGetMethodNameFromLastStack()
    {
        $name = $this->stackInfo->getMethodNameFromLastStack();
        $this->assertEquals('function_3', $name, 'Can\'t get method name from last stack entry');
    }

    public function testCanGetArgsFromLastStack()
    {
        $name = $this->stackInfo->getArgsFromLastStack();
        $this->assertEquals(['args_3'], $name, 'Can\'t get args from last stack entry');
    }

    public function testCanGetLastTrace()
    {
        $trace = $this->stackInfo->getLastStackTrace();
        $this->assertInternalType('array', $trace, 'Can\'t get last from for stack');
    }
}