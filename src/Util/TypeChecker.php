<?php
/**
 * Common data types implementations
 *
 * @author  Михаил Красильников <m.krasilnikov@yandex.ru>
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Mekras\Types\Util;

/**
 * Tool for type checking
 *
 * @api
 * @since x.xx
 */
class TypeChecker
{
    /**
     * Return true if $value can be casted to string
     *
     * Examples:
     *
     * ```
     * 'foo' => true
     * 123 => true
     * null => true
     * true => true
     * false => true
     * new \Exception() => true
     * [] => false
     * new \stdClass() => false
     * ```
     *
     * @param mixed $value
     *
     * @return bool
     *
     * @since x.xx
     */
    public static function isString($value)
    {
        if (is_object($value) && method_exists($value, '__toString')) {
            return true;
        }

        if (is_null($value)) {
            return true;
        }

        return is_scalar($value);
    }
}
