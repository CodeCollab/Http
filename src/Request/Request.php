<?php declare(strict_types=1);
/**
 * Request class
 *
 * Parts of this class are taken from https://github.com/rdlowrey/Arya/blob/master/lib/Request.php
 *
 * PHP version 7.0
 *
 * @category   CodeCollab
 * @package    Http
 * @subpackage Request
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 * @author     Contributors of the Request class in Arya <https://github.com/rdlowrey/Arya/blob/master/lib/Request.php>
 * @copyright  Copyright (c) 2015 Pieter Hordijk <https://github.com/PeeHaa>
 * @copyright  Copyright (c) 2015 The Arya contributors
 * @license    See the LICENSE file
 * @license    https://github.com/rdlowrey/Arya/blob/master/LICENSE.md (MIT)
 * @version    1.0.0
 */
namespace CodeCollab\Http\Request;

/**
 * Request class
 *
 * @category   CodeCollab
 * @package    Http
 * @subpackage Request
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
class Request
{
    /**
     * @var array The SERVER variables
     */
    private $server = [];

    /**
     * @var array The headers
     */
    private $headers = [];

    /**
     * @var array The GET variables
     */
    private $get = [];

    /**
     * @var array The POST variables
     */
    private $post = [];

    /**
     * @var array The FILES variables
     */
    private $files = [];

    /**
     * @var array The COOKIE variables
     */
    private $cookies = [];

    /**
     * @var string The request body
     */
    private $input;

    /**
     * @var bool Whether the request is over ssl/tls
     */
    private $isEncrypted = false;

    /**
     * Creates instance
     *
     * @param array  $server  The SERVER variables
     * @param array  $get     The GET variables
     * @param array  $post    The POST variables
     * @param array  $files   The FILES variables
     * @param array  $cookies The COOKIE variables
     * @param string $input   The body of the request
     */
    public function __construct(array $server, array $get, array $post, array $files, array $cookies, string $input)
    {
        $this->processServerVariables($server);

        $this->get     = $get;
        $this->post    = $post;
        $this->files   = $files;
        $this->cookies = $cookies;
        $this->input   = $input;
    }

    /**
     * Processes the server variables
     *
     * @param array $server The server variables
     */
    private function processServerVariables(array $server)
    {
        foreach ($server as $key => $value) {
            $this->server[$key] = $value;

            if (strpos($key, 'HTTP_') === 0) {
                $key = str_replace('_', '-', substr($key, 5));

                $this->headers[$key] = $value;
            }
        }

        $uri     = $server['REQUEST_URI'];
        $uriPath = parse_url($uri, PHP_URL_PATH);

        $this->server['REQUEST_URI']      = $uri;
        $this->server['REQUEST_URI_PATH'] = $uriPath;

        $this->isEncrypted = !(empty($server['HTTPS']) || strcasecmp($server['HTTPS'], 'off') === 0);

        $this->server['SERVER_PROTOCOL'] = substr($server['SERVER_PROTOCOL'], -3);

        if (isset($server['CONTENT_LENGTH'])) {
            $this->headers['CONTENT-LENGTH'] = $server['CONTENT_LENGTH'];
        }

        if (isset($server['CONTENT_TYPE'])) {
            $this->headers['CONTENT-TYPE'] = $server['CONTENT_TYPE'];
        }
    }

    /**
     * Gets a server variable
     *
     * @param string $key The name of the post variable to retrieve
     *
     * @return string The value of the post variable
     */
    public function server(string $key): string
    {
        if (array_key_exists($key, $this->server)) {
            return $this->server[$key];
        }

        return '';
    }

    /**
     * Gets all server variables
     *
     * @return array The server variables
     */
    public function serverArray(): array
    {
        return $this->server;
    }

    /**
     * Gets a header
     *
     * @param string $key The name of the header to retrieve
     *
     * @return string The value of the header
     */
    public function header(string $key): string
    {
        if (array_key_exists($key, $this->headers)) {
            return $this->headers[$key];
        }

        return '';
    }

    /**
     * Gets all headers
     *
     * @return array The headers
     */
    public function headerArray(): array
    {
        return $this->headers;
    }

    /**
     * Gets a get variable
     *
     * @param string $key The name of the get variable to retrieve
     *
     * @return string The value of the get variable
     */
    public function get(string $key): string
    {
        if (array_key_exists($key, $this->get)) {
            return $this->get[$key];
        }

        return '';
    }

    /**
     * Gets all get variables
     *
     * @return array The get variables
     */
    public function getArray(): array
    {
        return $this->get;
    }

    /**
     * Gets a post variable
     *
     * @param string $key The name of the post variable to retrieve
     *
     * @return string The value of the post variable
     */
    public function post(string $key): string
    {
        if (array_key_exists($key, $this->post)) {
            return $this->post[$key];
        }

        return '';
    }

    /**
     * Gets all post variables
     *
     * @return array The post variables
     */
    public function postArray(): array
    {
        return $this->post;
    }

    /**
     * Gets an item from the files
     *
     * @param string $key The name of the file to retrieve
     *
     * @return array The file
     */
    public function files(string $key): array
    {
        if (array_key_exists($key, $this->files)) {
            return $this->files[$key];
        }

        return [];
    }

    /**
     * Gets all files
     *
     * @return array The file
     */
    public function filesArray(): array
    {
        return $this->files;
    }

    /**
     * Gets a cookie
     *
     * @param string $key The name of the cookie to retrieve
     *
     * @return string The value of the cookie
     */
    public function cookie(string $key): string
    {
        if (array_key_exists($key, $this->cookies)) {
            return $this->cookies[$key];
        }

        return '';
    }

    /**
     * Gets all cookies
     *
     * @return array The cookies
     */
    public function cookieArray(): array
    {
        return $this->cookies;
    }

    /**
     * Gets the raw request body
     *
     * @return string The raw request body
     */
    public function getBody(): string
    {
        return $this->input;
    }

    /**
     * Checks whether the request is secure (ssl/tls)
     *
     * @return bool True when the request has been made over ssl/tls
     */
    public function isEncrypted(): bool
    {
        return $this->isEncrypted;
    }

    /**
     * Gets the base URL of the request
     *
     * The base URL consist of the protocol (http(s)), the domain name and
     * the port number when using a non standard port
     *
     * @return string The base URL
     */
    public function getBaseUrl(): string
    {
        $schemeAndHttpHost = 'http';

        if ($this->isEncrypted()) {
            $schemeAndHttpHost .= 's';
        }

        $schemeAndHttpHost .= '://' . $this->server('SERVER_NAME');

        if ((!$this->isEncrypted() && $this->server('SERVER_PORT') !== '80')
            || ($this->isEncrypted() && $this->server('SERVER_PORT') !== '443'))
        {
            $schemeAndHttpHost .= ':' . $this->server('SERVER_PORT');
        }

        return $schemeAndHttpHost;
    }

    /**
     * Checks whether the URI path starts with a pattern
     *
     * @param string $pattern The pattern to match against
     *
     * @return bool True when the URI path starts with the pattern
     */
    public function startsWith(string $pattern): bool
    {
        return strpos($this->server('REQUEST_URI_PATH'), $pattern) === 0;
    }

    /**
     * Checks whether the URI path matches a pattern
     *
     * @param string $pattern The pattern to match against
     *
     * @return bool True when the URI path matches the pattern
     */
    public function matches(string $pattern): bool
    {
        return $this->server('REQUEST_URI_PATH') === $pattern;
    }
}
