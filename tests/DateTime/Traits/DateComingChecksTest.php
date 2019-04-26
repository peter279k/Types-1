<?php
/**
 * Common data types implementations
 *
 * @author  Михаил Красильников <m.krasilnikov@yandex.ru>
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Mekras\Types\Tests\DateTime\Traits;

use Mekras\Types\DateTime\Traits\DateComingChecks;
use PHPUnit\Framework\TestCase;

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
class DateComingChecksTest extends TestCase
{
    /**
     * Check isDateHasCome method
     */
    public function testIsDateHasCome()
    {
        $time = new DateComingChecksClass('now');
        static::assertTrue($time->isDateHasCome(), 'now');

        $time = new DateComingChecksClass('yesterday');
        static::assertTrue($time->isDateHasCome(), 'yesterday');

        $time = new DateComingChecksClass('tomorrow');
        static::assertFalse($time->isDateHasCome(), 'tomorrow');
    }

    /**
     * Check isDateWillComeIn method
     */
    public function testIsDateWillComeIn()
    {
        $time = new DateComingChecksClass('now');
        $time->add(new \DateInterval('P1W'));

        static::assertFalse($time->isDateWillComeIn('P5D'), 'P5D');
        static::assertTrue($time->isDateWillComeIn('P10D'), 'P10D');
    }
}
