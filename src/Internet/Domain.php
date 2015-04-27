<?php
/**
 * Domain
 *
 * @copyright 2014, Михаил Красильников <m.krasilnikov@yandex.ru>
 * @author Михаил Красильников <m.krasilnikov@yandex.ru>
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Mekras\Types\Internet;

use InvalidArgumentException;

/**
 * Domain
 *
 * @api
 * @since 1.00
 */
class Domain
{
    /**
     * Full domain name
     *
     * @var string
     */
    private $fullName;

    /**
     * Short name (till first dot)
     *
     * @var null|string
     */
    private $shortName;

    /**
     * Domain parts
     *
     * @var string[]
     */
    private $parts;

    /**
     * Creates new domain from string
     *
     * @param string $full domain name (e. g. "foo.bar.com")
     *
     * @throws InvalidArgumentException
     *
     * @since 1.00
     */
    public function __construct($full)
    {
        if (mb_strlen($full, 'UTF-8') < 2) {
            throw new InvalidArgumentException("\"$full\" is not a valid domain name");
        }
        $this->fullName = strval($full);
        $this->parts = explode('.', $this->fullName);
        $this->shortName = $this->parts[0];
    }

    /**
     * Returns full domain name (e. g. "foo.bar.com")
     *
     * @return string
     *
     * @since 1.00
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Returns short name (e. g. "foo" for "foo.bar.com").
     *
     * @return string
     *
     * @since 1.00
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * Returns domain level (e. g. 3 for "foo.bar.com")
     *
     * @return int
     *
     * @since 1.00
     */
    public function getLevel()
    {
        return count($this->parts);
    }

    /**
     * String representation
     *
     * @return string
     *
     * @since 1.00
     */
    public function __toString()
    {
        return $this->getFullName();
    }
}
