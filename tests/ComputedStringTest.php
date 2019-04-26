<?php
/**
 * Common data types implementations
 *
 * @author  Михаил Красильников <m.krasilnikov@yandex.ru>
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Mekras\Types\Tests;

use Mekras\Types\ComputedString;
use PHPUnit\Framework\TestCase;

/**
 * Tests for Mekras\Types\ComputedString
 *
 * @covers Mekras\Types\ComputedString
 */
class ComputedStringTest extends TestCase
{
    /**
     * Basics checks
     */
    public function testBasic()
    {
        $wasExecuted = false;
        $string = new ComputedString(
            function () use (&$wasExecuted) {
                $wasExecuted = true;
                return 'OK';
            }
        );
        static::assertFalse($wasExecuted);
        static::assertEquals('OK', $string);
        static::assertTrue($wasExecuted);
    }

    /**
     * Exception handling
     */
    public function testException()
    {
        $string = new ComputedString(
            function () {
                throw new \Exception('Foo error');
            }
        );
        static::assertEquals('[Exception: Foo error]', $string);
    }
}
