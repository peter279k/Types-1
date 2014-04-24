<?php
/**
 * E-mail address
 *
 * @copyright 2014, Михаил Красильников <m.krasilnikov@yandex.ru>
 * @author Михаил Красильников <m.krasilnikov@yandex.ru>
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Mekras\Types\Internet;

use InvalidArgumentException;

/**
 * E-mail address
 *
 * @api
 * @since 1.00
 */
class EmailAddress
{
    /**
     * User name (address local part)
     *
     * @var string
     */
    private $user;

    /**
     * Domain
     *
     * @var Domain
     */
    private $domain;

    /**
     * Creates new e-mail address
     *
     * @param string $email string representation of address (e. g. "foo@example.com")
     *
     * @throws InvalidArgumentException
     *
     * @since 1.00
     */
    public function __construct($email)
    {
        $email = strval($email);
        $parts = explode('@', $email);
        if (count($parts) != 2)
        {
            throw new InvalidArgumentException("\"$email\" is not a valid e-mail address");
        }

        $this->user = $parts[0];
        $this->domain = new Domain($parts[2]);
    }

    /**
     * Returns username (e. g. "foo" for "foo@example.com")
     *
     * @return string
     *
     * @since 1.00
     */
    public function getUsername()
    {
        return $this->user;
    }

    /**
     * Returns domain
     *
     * @return Domain
     *
     * @since 1.00
     */
    public function getDomain()
    {
        return $this->domain;
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
        return $this->user . '@' . $this->domain;
    }
}
