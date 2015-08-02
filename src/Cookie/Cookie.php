<?php declare(strict_types=1);
/**
 * Cookie class
 *
 * PHP version 7.0
 *
 * @category   CodeCollab
 * @package    Http
 * @subpackage Cookie
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 * @copyright  Copyright (c) 2015 Pieter Hordijk <https://github.com/PeeHaa>
 * @license    See the LICENSE file
 * @version    1.0.0
 */
namespace CodeCollab\Http\Cookie;

/**
 * Cookie class
 *
 * @category   CodeCollab
 * @package    Http
 * @subpackage Cookie
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
class Cookie
{
    /**
     * @var string The name of the cookie
     */
    private $name;

    /**
     * @var mixed The value of eth cookie
     */
    private $value;

    /**
     * @var \DateTime The expiration date
     */
    private $expire;

    /**
     * @var string The path on which the cookie is valid
     */
    private $path;

    /**
     * @var string The domain on which the cookie is valid
     */
    private $domain;

    /**
     * @var bool Whether the cookie must only be sent over SSL/TLS
     */
    private $secure;

    /**
     * @var bool Whether the cookie can be handled from the client side
     */
    private $httpOnly = true;

    /**
     * Creates instance
     *
     * @param string    $name   The name of the cookie
     * @param mixed     $value  The value of the cookie
     * @param \DateTime $expire The expiration date
     * @param string    $path   The path on which the cookie is valid
     * @param string    $domain The domain on which the cookie is valid
     * @param bool      $secure Whether the cookie must only be sent over SSL/TLS
     */
    public function __construct(string $name, $value, \DateTime $expire, string $path, string $domain, bool $secure)
    {
        $this->name   = $name;
        $this->value  = $value;
        $this->expire = $expire;
        $this->path   = $path;
        $this->domain = $domain;
        $this->secure = $secure;
    }

    /**
     * Sends the cookie header
     */
    public function send()
    {
        setcookie(
            $this->name,
            $this->value,
            (int) $this->expire->format('U'),
            $this->path,
            $this->domain,
            $this->secure,
            $this->httpOnly
        );
    }
}
