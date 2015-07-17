<?php
/**
 * Common data types implementations
 *
 * @author  Михаил Красильников <m.krasilnikov@yandex.ru>
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Mekras\Types\Tests\Internet;

use Mekras\Types\Internet\Domain;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Domain Tests
 *
 * @covers Mekras\Types\Internet\Domain
 */
class DomainTest extends TestCase
{
    /**
     *
     */
    public function testBasics()
    {
        $domain = new Domain('www.example.com');
        static::assertEquals(3, $domain->getLevel());
        static::assertEquals('www.example.com', $domain->getFullName());
        static::assertEquals('www', $domain->getShortName());
        static::assertEquals('www.example.com', strval($domain));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage "a" is not a valid domain name
     */
    public function testInvalidDomain()
    {
        new Domain('a');
    }
}
