<?php declare(strict_types=1);
/**
 * Response class
 *
 * PHP version 7.0
 *
 * @category   CodeCollab
 * @package    Http
 * @subpackage Response
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 * @copyright  Copyright (c) 2015 Pieter Hordijk <https://github.com/PeeHaa>
 * @license    See the LICENSE file
 * @version    1.0.0
 */
namespace CodeCollab\Http\Response;

use CodeCollab\Http\Request\Request;
use CodeCollab\Http\Cookie\Factory as CookieFactory;

/**
 * Response class
 *
 * @category   CodeCollab
 * @package    Http
 * @subpackage Response
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
class Response
{
    /**
     * @var \CodeCollab\Http\Request\Request The request object
     */
    private $request;

    /**
     * @var \CodeCollab\Http\Response\StatusCode The status code
     */
    private $statusCode;

    /**
     * @var \CodeCollab\Http\Cookie\Factory The cookie factory
     */
    private $cookieFactory;

    /**
     * @var string The body
     */
    private $body = '';

    /**
     * @var int Numerical status code
     */
    private $numericStatusCode = 200;

    /**
     * @var string Textual status code
     */
    private $textualStatusCode;

    /**
     * @var array The headers
     */
    private $headers = [];

    /**
     * @var array The cookies
     */
    private $cookies = [];

    /**
     * Creates instance
     *
     * @param \CodeCollab\Http\Request\Request $request       The request object
     * @param \CodeCollab\Http\Response        $statusCode    The status code object
     * @param \CodeCollab\Http\Cookie\Factory  $cookieFactory Instance of a cookie factory
     */
    public function __construct(Request $request, StatusCode $statusCode, CookieFactory $cookieFactory)
    {
        $this->request       = $request;
        $this->statusCode    = $statusCode;
        $this->cookieFactory = $cookieFactory;
    }

    /**
     * Sets the body
     *
     * @param string $body The body
     */
    public function setContent(string $body)
    {
        $this->body = $body;
    }

    /**
     * Sets the status code
     *
     * @param int    $numeric Numerical status code representation
     * @param string $textual Textual status code representation
     */
    public function setStatusCode(int $numeric, string $textual = null)
    {
        $this->numericStatusCode = $numeric;

        if ($textual !== null) {
            $this->textualStatusCode = $textual;
        }
    }

    /**
     * Adds a header
     *
     * @param string $key   The name of the header
     * @param string $value The value of the header
     */
    public function addHeader(string $key, string $value)
    {
        $this->headers[$key] = $value;
    }

    /**
     * Adds a cookie
     *
     * @param string    $key    The name of the cookie
     * @param mixed     $value  The value pf the cookie
     * @param \DateTime $expire The expiration date
     */
    public function addCookie(string $key, $value, \DateTime $expire)
    {
        $this->cookies[$key] = $this->cookieFactory->build($key, $value, $expire);
    }

    /**
     * Sends the response to the client
     */
    public function send()
    {
        $this->sendCookies();

        $this->sendHeaders();

        if ($this->request->server('REQUEST_METHOD') === 'HEAD') {
            return '';
        }

        echo $this->body;
    }

    /**
     * Sends the cookies to the client
     */
    private function sendCookies()
    {
        foreach ($this->cookies as $cookie) {
            $cookie->send();
        }
    }

    /**
     * Sends the headers to the client
     */
    private function sendHeaders()
    {
        if (!array_key_exists('Content-Type', $this->headers)) {
            $this->headers['Content-Type'] = 'text/html; charset=UTF-8';
        }

        $this->headers['Content-Length'] = strlen($this->body);

        header(
            sprintf(
                'HTTP/%s %s %s',
                $this->request->server('SERVER_PROTOCOL'),
                $this->numericStatusCode,
                $this->textualStatusCode ?: $this->statusCode->getText($this->numericStatusCode)
            ),
            true,
            $this->numericStatusCode
        );

        foreach ($this->headers as $key => $value) {
            header(sprintf('%s: %s', $key, $value));
        }
    }
}
