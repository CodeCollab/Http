<?php declare(strict_types=1);
/**
 * Native session handler
 *
 * PHP version 7.0
 *
 * @category   CodeCollab
 * @package    Http
 * @subpackage Session
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 * @copyright  Copyright (c) 2015 Pieter Hordijk <https://github.com/PeeHaa>
 * @license    See the LICENSE file
 * @version    1.0.0
 */
namespace CodeCollab\Http\Session;

/**
 * Native session handler
 *
 * @category   CodeCollab
 * @package    Http
 * @subpackage Session
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
class Native implements Session
{
    /**
     * Creates instance
     *
     * @param string $path   Path on the domain where the cookie will work, use a single slash ('/') for all paths on
     *                       the domain
     * @param strng  $domain Cookie domain, for example 'www.php.net'. To make cookies visible on all subdomains then
     *                       the domain must be prefixed with a dot like '.php.net'
     * @param bool   $secure If true cookie will only be sent over secure connections.
     */
    public function __construct(string $path, string $domain, bool $secure)
    {
        session_set_cookie_params(0, $path, $domain, $secure, true);
        session_start();
    }

    /**
     * Checks whether an offset exists
     *
     * @param mixed $offset The offset to check
     *
     * @return bool True when the offset exists
     */
    public function exists($offset): bool
    {
        return isset($_SESSION[$offset]);
    }

    /**
     * Gets a value
     *
     * @param mixed $offset The offset
     *
     * @return mixed The value
     */
    public function get($offset)
    {
        return $_SESSION[$offset];
    }

    /**
     * Sets a value
     *
     * @param mixed $offset The offset to set
     * @param mixed $value  The value to set
     */
    public function set($offset, $value)
    {
        $_SESSION[$offset] = $value;
    }

    /**
     * Unsets an offset
     *
     * @param mixed $offset The offset to unset
     */
    public function unset($offset)
    {
        unset($_SESSION[$offset]);
    }

    /**
     * Regenerates the session id
     */
    public function regenerate()
    {
        session_regenerate_id();
    }

    /**
     * Destroys a session including all data
     */
    public function destroy()
    {
        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        session_destroy();

        session_start();
    }
}
