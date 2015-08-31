<?php declare(strict_types=1);
/**
 * Cookie factory
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

use CodeCollab\Encryption\Encryptor;

/**
 * Cookie factory
 *
 * @category   CodeCollab
 * @package    Http
 * @subpackage Cookie
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
class Factory
{
    /**
     * @var \CodeCollab\Encryption\Encryptor Instance of an encryptor
     */
    private $encryptor;

    /**
     * @var string The domain of the cookies
     */
    private $domain;

    /**
     * @var bool Whether the cookies should only be sent over SSL/TLS connections
     */
    private $secure;

    /**
     * Creates instance
     *
     * @param \CodeCollab\Encryption\Encryptor $encryptor Instance of an encryptor
     * @param string                           $domain    The domain of the cookies
     * @param bool                             $secure    Whether the cookies should only be sent over SSL/TLS connections
     */
    public function __construct(Encryptor $encryptor, string $domain, bool $secure)
    {
        $this->encryptor = $encryptor;
        $this->domain    = $domain;
        $this->secure    = $secure;
    }

    /**
     * Builds a new cookie
     *
     * @param string    $key    The name of the cookie
     * @param mixed     $value  The value of the cookie
     * @param \DateTime $expire The expiration time of the cookie
     *
     * @return \CodeCollab\Http\Cookie\Cookie The built cookie
     */
    public function build(string $key, $value, \DateTime $expire = null): Cookie
    {
        return new Cookie($key, $this->encryptor->encrypt($value), $expire, '/', $this->domain, $this->secure);
    }
}
