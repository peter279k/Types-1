<?php
/**
 * Common data types implementations
 *
 * @author  Михаил Красильников <m.krasilnikov@yandex.ru>
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Mekras\Types\Exception;

use Exception;
use InvalidArgumentException;

/**
 * Invalid argument type
 *
 * @api
 * @since 1.04
 */
class InvalidArgumentTypeException extends InvalidArgumentException
{
    /**
     * Constructs new exception
     *
     * Example:
     *
     * ```php
     * class MyClass {
     *     public myMethod($arg1, $arg2) {
     *         if (!is_string($arg2) {
     *             throw new InvalidArgumentTypeException(__METHOD__, 2, 'string', $arg2);
     *         // ...
     * ```
     *
     * This will throw exception with message:
     * <samp>MyClass::myMethod expects parameter 2 to be string, NULL given</samp>
     *
     * @param string    $method   called method
     * @param int       $argNum   argument running number
     * @param string    $expected expected argument type
     * @param mixed     $provided given argument
     * @param int       $code     error code
     * @param Exception $previous previous exception
     *
     * @since 1.04
     */
    public function __construct(
        $method,
        $argNum,
        $expected,
        $provided,
        $code = 0,
        Exception $previous = null
    ) {
        switch (true) {

            case is_object($provided):
                $provided = get_class($provided);
                break;

            case is_string($provided):
                $provided = sprintf('string(%s)', $provided);
                break;

            case is_bool($provided):
                $provided = sprintf('bool(%s)', $provided ? 'true' : 'false');
                break;

            case is_int($provided):
                $provided = sprintf('int(%d)', $provided);
                break;

            case is_float($provided):
                $provided = sprintf('float(%.2f)', $provided);
                break;

            default:
                $provided = gettype($provided);
        }
        $message = sprintf(
            '%s expects parameter %d to be %s, %s given',
            $method,
            $argNum,
            $expected,
            $provided
        );
        parent::__construct($message, $code, $previous);
    }
}
