<?php
/**
 * Common data types implementations
 *
 * @author  Михаил Красильников <m.krasilnikov@yandex.ru>
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Mekras\Types;

use Closure;

/**
 * Computed string
 *
 * Allow to create string representable objects to defer string generation.
 *
 * ```php
 * $logger->debug(new ComputedString(function { return 'some heavy calculations';}));
 * ```
 *
 * @api
 * @since x.xx
 */
class ComputedString
{
    /**
     * String factory
     *
     * @var Closure
     */
    private $closure;

    /**
     * Creates new lazy string
     *
     * @param Closure $closure string factory
     *
     * @since x.xx
     */
    public function __construct(Closure $closure)
    {
        $this->closure = $closure;
    }

    /**
     * Compute and return string
     *
     * @return string
     *
     * @since x.xx
     */
    public function __toString()
    {
        try {
            return (string) call_user_func($this->closure);
        } catch (\Exception $e) {
            return '[' . get_class($e) . ': ' . $e->getMessage() . ']';
        }
    }
}
