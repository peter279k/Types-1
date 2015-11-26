<?php
/**
 * Common data types implementations
 *
 * @author  Михаил Красильников <m.krasilnikov@yandex.ru>
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
     * Test basic functions
     */
    public function testBasics()
    {
        $email = new EmailAddress('foo.bar@example.com');
        static::assertEquals('foo.bar', $email->getMailbox());
        static::assertEquals('example.com', (string) $email->getDomain());
        static::assertEquals('foo.bar@example.com', (string) $email);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidAddressNoAt()
    {
        new EmailAddress('example.com');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidAddressTooManyAts()
    {
        new EmailAddress('foo@bar@example.com');
    }

    /**
     * Tests for display name
     */
    public function testDisplayName()
    {
        $email = new EmailAddress('foo@example.com');
        static::assertEquals('', $email->getDisplayName(), 'No name');

        $email = new EmailAddress('Foo Bar <foo@example.com>');
        static::assertEquals('Foo Bar', $email->getDisplayName(), 'Full name');

        $email = new EmailAddress('<foo@example.com>');
        static::assertEquals('', $email->getDisplayName(), 'Empty name');

        $email = new EmailAddress('foo@example.com', 'Foo Bar');
        static::assertEquals('Foo Bar', $email->getDisplayName(), 'Full name in constructor');

        $email = new EmailAddress('Foo <foo@example.com>', 'Bar');
        static::assertEquals('Bar', $email->getDisplayName(), 'Name override in constructor');
    }

    /**
     * Test obsolete functions
     */
    public function testObsolete()
    {
        $email = new EmailAddress('foo.bar@example.com');
        static::assertEquals('foo.bar', $email->getUsername());
    }
}
