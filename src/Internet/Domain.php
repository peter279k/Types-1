<?php
/**
 * Domain
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
 * Domain
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
     */
    public function __construct($full)
    {
        if (mb_strlen($full, 'UTF-8') < 2)
        {
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
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Returns short name (e. g. "foo" for "foo.bar.com").
     *
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * Returns domain level (e. g. 3 for "foo.bar.com")
     *
     * @return int
     */
    public function getLevel()
    {
        return count($this->parts);
    }

    /**
     * String representation
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getFullName();
    }
}
