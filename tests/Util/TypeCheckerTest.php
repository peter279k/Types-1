<?php
/**
 * Common data types implementations
 *
 * @author  Михаил Красильников <m.krasilnikov@yandex.ru>
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Mekras\Types\Tests\Util;

use Mekras\Types\Util\TypeChecker;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Tests for Mekras\Types\Util\TypeChecker
 *
 * @covers Mekras\Types\Util\TypeChecker
 */
class TypeCheckerTest extends TestCase
{
    /**
     *
     */
    public function testIsStringCompat()
    {
        static::assertTrue(TypeChecker::isString('foo'), 'string');
        static::assertTrue(TypeChecker::isString(123), 'integer');
        static::assertTrue(TypeChecker::isString(null), 'null');
        static::assertTrue(TypeChecker::isString(true), 'true');
        static::assertTrue(TypeChecker::isString(false), 'false');
        static::assertTrue(TypeChecker::isString(new \Exception()), 'exception');

        static::assertFalse(TypeChecker::isString([]), 'array');
        static::assertFalse(TypeChecker::isString(new \stdClass()), 'object w/o __toString');
    }
}
