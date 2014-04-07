<?php
/**
 * E-mail address
 *
 * @copyright 2014, Михаил Красильников <m.krasilnikov@yandex.ru>
 * @author Михаил Красильников <m.krasilnikov@yandex.ru>
 * @license http://www.gnu.org/licenses/gpl.txt GNU Public License
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace Mekras\Types\Internet;

use InvalidArgumentException;

/**
 * E-mail address
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
     */
    public function getUsername()
    {
        return $this->user;
    }

    /**
     * Returns domain
     *
     * @return Domain
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * String representation
     *
     * @return string
     */
    public function __toString()
    {
        return $this->user . '@' . $this->domain;
    }
}
