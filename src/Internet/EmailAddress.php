<?php
/**
 * Common data types implementations.
 *
 * @author  Михаил Красильников <m.krasilnikov@yandex.ru>
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Mekras\Types\Internet;

/**
 * E-mail address.
 *
 * @api
 * @since 1.0
 */
class EmailAddress
{
    /**
     * Mailbox name (address local part).
     *
     * @var string
     */
    private $mailbox;

    /**
     * Domain name.
     *
     * @var Domain
     */
    private $domain;

    /**
     * Display name.
     *
     * @var string
     */
    private $displayName = '';

    /**
     * Create new e-mail address.
     *
     * @param string $email       E-mail address (e. g. "Foo <foo@example.com>").
     * @param string $displayName Optional display name.
     *
     * @throws \InvalidArgumentException
     *
     * @since 1.6 Display name can not be null.
     * @since 1.5 Display name support added.
     * @since 1.0
     */
    public function __construct($email, $displayName = '')
    {
        $email = trim($email);

        if (substr($email, -1) === '>'
            && preg_match('/^(?<display_name>.*\S)?\s*<(?<address>.+)>$/', $email, $matches)
        ) {
            $this->displayName = $matches['display_name'];
            $email = $matches['address'];
        }

        if ('' !== $displayName) {
            $this->displayName = $displayName;
        }

        $parts = explode('@', $email);
        if (count($parts) !== 2) {
            throw new \InvalidArgumentException(
                sprintf('"%s" is not a valid e-mail address', $email)
            );
        }

        $this->mailbox = $parts[0];
        $this->domain = new Domain($parts[1]);
    }

    /**
     * String representation.
     *
     * @return string
     *
     * @since 1.0
     */
    public function __toString()
    {
        return $this->mailbox . '@' . $this->domain;
    }

    /**
     * Returns mailbox (e. g. "foo" for "foo@example.com").
     *
     * @return string
     *
     * @since 1.5
     */
    public function getMailbox()
    {
        return $this->mailbox;
    }

    /**
     * Return username (e. g. "foo" for "foo@example.com").
     *
     * @return string
     *
     * @deprecated use {@see getMailbox()}
     *
     * @since      1.5 Deprecated.
     * @since      1.0
     */
    public function getUsername()
    {
        return $this->getMailbox();
    }

    /**
     * Return domain.
     *
     * @return Domain
     *
     * @since 1.0
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Return display name  (e. g. "Foo" for "Foo <foo@example.com>").
     *
     * @return string
     *
     * @since 1.6 Never returns null.
     * @since 1.5
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }
}
