<?php
/**
 * Common data types implementations
 *
 * @author  Михаил Красильников <m.krasilnikov@yandex.ru>
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Mekras\Types\Tests\Exception;

use Mekras\Types\Exception\InvalidArgumentTypeException;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Tests for Mekras\Types\Exception\InvalidArgumentTypeException
 *
 * @covers Mekras\Types\Exception\InvalidArgumentTypeException
 */
class InvalidArgumentTypeExceptionTest extends TestCase
{
    /**
     * null
     */
    public function testNullValue()
    {
        $e = new InvalidArgumentTypeException('MyClass::myMethod', 2, 'foo', null);
        static::assertEquals(
            'MyClass::myMethod expects parameter 2 to be foo, NULL given',
            $e->getMessage()
        );
    }

    /**
     * Boolean
     */
    public function testBoolValue()
    {
        $e = new InvalidArgumentTypeException('MyClass::myMethod', 2, 'foo', false);
        static::assertEquals(
            'MyClass::myMethod expects parameter 2 to be foo, bool(false) given',
            $e->getMessage()
        );
    }

    /**
     * String
     */
    public function testStringValue()
    {
        $e = new InvalidArgumentTypeException('MyClass::myMethod', 2, 'foo', 'foo');
        static::assertEquals(
            'MyClass::myMethod expects parameter 2 to be foo, string(foo) given',
            $e->getMessage()
        );
    }

    /**
     * Integer
     */
    public function testIntValue()
    {
        $e = new InvalidArgumentTypeException('MyClass::myMethod', 2, 'foo', 123);
        static::assertEquals(
            'MyClass::myMethod expects parameter 2 to be foo, int(123) given',
            $e->getMessage()
        );
    }

    /**
     * Float
     */
    public function testFloatValue()
    {
        $e = new InvalidArgumentTypeException('MyClass::myMethod', 2, 'foo', 1.23);
        static::assertEquals(
            'MyClass::myMethod expects parameter 2 to be foo, float(1.23) given',
            $e->getMessage()
        );
    }

    /**
     * Array
     */
    public function testArrayValue()
    {
        $e = new InvalidArgumentTypeException('MyClass::myMethod', 2, 'foo', [1, 2, 3]);
        static::assertEquals(
            'MyClass::myMethod expects parameter 2 to be foo, array given',
            $e->getMessage()
        );
    }

    /**
     * Object
     */
    public function testObjectValue()
    {
        $e = new InvalidArgumentTypeException('MyClass::myMethod', 2, 'foo', new \stdClass());
        static::assertEquals(
            'MyClass::myMethod expects parameter 2 to be foo, stdClass given',
            $e->getMessage()
        );
    }
}
