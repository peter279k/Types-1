<?php
/**
 * Date coming checks for DateTime
 *
 * @copyright 2014, Михаил Красильников <m.krasilnikov@yandex.ru>
 * @author    Михаил Красильников <m.krasilnikov@yandex.ru>
 * @license   http://opensource.org/licenses/MIT MIT
 */
namespace Mekras\Types\DateTime\Traits;

/**
 * Date coming checks for DateTime
 *
 * This trait should be used in a child classes of DateTime.
 *
 * @api
 * @since x.xx
 */
trait DateComingChecks
{
    /**
     * Return TRUE if this date has come
     *
     * @return bool
     *
     * @since x.xx
     */
    public function isDateHasCome()
    {
        return 0 === $this->diff(new \DateTime('now'))->invert;
    }

    /**
     * Return TRUE if this date will come in a given interval
     *
     * @param \DateInterval|string $interval DateInterval or string interval specification
     *
     * @return bool
     *
     * @link http://php.net/DateInterval
     *
     * @since x.xx
     */
    public function isDateWillComeIn($interval)
    {
        if (!($interval instanceof \DateInterval))
        {
            $interval = new \DateInterval(strval($interval));
        }
        $now = new \DateTime('now');
        return 0 === $this->diff($now->add($interval))->invert;
    }

    /**
     * Returns the difference between two DateTime objects
     *
     * @param \DateTimeInterface $datetime2
     * @param bool               $absolute
     *
     * @return \DateInterval
     */
    abstract public function diff($datetime2, $absolute = false);
}
