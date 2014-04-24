<?php
/**
 * Domain Tests
 *
 * @copyright 2014, Михаил Красильников <m.krasilnikov@yandex.ru>
 * @author Михаил Красильников <m.krasilnikov@yandex.ru>
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Mekras\Types\Tests\Internet;

use Mekras\Types\Internet\Domain;

/**
 * Domain Tests
 */
class DomainTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Mekras\Types\Internet\Domain
     */
    public function testBasics()
    {
        $domain = new Domain('www.example.com');
        $this->assertEquals(3, $domain->getLevel());
        $this->assertEquals('www.example.com', $domain->getFullName());
        $this->assertEquals('www', $domain->getShortName());
        $this->assertEquals('www.example.com', strval($domain));
    }
}
