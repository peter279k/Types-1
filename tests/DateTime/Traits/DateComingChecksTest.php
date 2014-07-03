<?php
/**
 * DateComingChecks Tests
 *
 * @copyright 2014, Михаил Красильников <m.krasilnikov@yandex.ru>
 * @author    Михаил Красильников <m.krasilnikov@yandex.ru>
 * @license   http://opensource.org/licenses/MIT MIT
 */
namespace Mekras\Types\Tests\DateTime\Traits;

use Mekras\Types\DateTime\Traits\DateComingChecks;

/**
 * Test implementation
 */
class DateComingChecksClass extends \DateTime
{
    use DateComingChecks;
}


/**
 * DateComingChecks Tests
 *
 * @covers Mekras\Types\DateTime\Traits\DateComingChecks
 */
class DateComingChecksTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Check isDateHasCome method
     */
    public function testIsDateHasCome()
    {
        $time = new DateComingChecksClass('now');
        $this->assertTrue($time->isDateHasCome(), 'now');

        $time = new DateComingChecksClass('yesterday');
        $this->assertTrue($time->isDateHasCome(), 'yesterday');

        $time = new DateComingChecksClass('tomorrow');
        $this->assertFalse($time->isDateHasCome(), 'tomorrow');
    }

    /**
     * Check isDateWillComeIn method
     */
    public function testIsDateWillComeIn()
    {
        $time = new DateComingChecksClass('now');
        $time->add(new \DateInterval('P1W'));

        $this->assertFalse($time->isDateWillComeIn('P5D'), 'P5D');
        $this->assertTrue($time->isDateWillComeIn('P10D'), 'P10D');
    }
}
