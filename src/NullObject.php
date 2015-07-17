<?php
/**
 * Common data types implementations
 *
 * @author  Михаил Красильников <m.krasilnikov@yandex.ru>
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Mekras\Types;

/**
 * Null
 *
 * @link  http://martinfowler.com/eaaCatalog/specialCase.html
 *
 * @since x.xx
 */
class NullObject
{
    /**
     * Fake methods
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return $this
     *
     * @since x.xx
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameters)
     */
    public function __call($name, $arguments)
    {
        return $this;
    }

    /**
     * Fake properties
     *
     * @param string $name
     * @param mixed  $value
     *
     * @since x.xx
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameters)
     */
    public function __set($name, $value)
    {
    }

    /**
     * Fake properties
     *
     * @param string $name
     *
     * @return $this
     *
     * @since x.xx
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameters)
     */
    public function __get($name)
    {
        return $this;
    }

    /**
     * String casting stub
     *
     * @return string
     *
     * @since x.xx
     */
    public function __toString()
    {
        return '';
    }
}
