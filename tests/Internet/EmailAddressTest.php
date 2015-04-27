<?php
/**
 * EmailAddress Tests
 *
 * @copyright 2014, Михаил Красильников <m.krasilnikov@yandex.ru>
 * @author Михаил Красильников <m.krasilnikov@yandex.ru>
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Mekras\Types\Tests\Internet;

use Mekras\Types\Internet\EmailAddress;

/**
 * EmailAddress Tests
 *
 * @covers Mekras\Types\Internet\EmailAddress
 */
class EmailAddressTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testBasics()
    {
        $email = new EmailAddress('foo.bar@example.com');
        static::assertEquals('foo.bar', $email->getUsername());
        static::assertEquals('example.com', strval($email->getDomain()));
        static::assertEquals('foo.bar@example.com', strval($email));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidAddress()
    {
        new EmailAddress('foo@bar@example.com');
    }
}
