<?php
/**
 * Common data types implementations
 *
 * @author  Михаил Красильников <m.krasilnikov@yandex.ru>
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Mekras\Types\Tests;

use Mekras\Types\NullObject;
use PHPUnit\Framework\TestCase;

/**
 * Tests for NullObject
 *
 * @covers Mekras\Types\NullObject
 */
class NullObjectTest extends TestCase
{
    /**
     * Ensure that there is no errors on accessing properties and methods of null object
     */
    public function testOverall()
    {
        $null = new NullObject();
        $x = $null->foo;
        $null->bar = $x;
        $null->baz();
        static::assertEquals('', $null);
    }
}
