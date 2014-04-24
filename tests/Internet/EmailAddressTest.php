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
 */
class EmailAddressTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Mekras\Types\Internet\EmailAddress
     */
    public function testBasics()
    {
        $email = new EmailAddress('foo.bar@example.com');
        $this->assertEquals('foo.bar', $email->getUsername());
        $this->assertEquals('example.com', strval($email->getDomain()));
        $this->assertEquals('foo.bar@example.com', strval($email));
    }
}
