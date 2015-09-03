<?php declare(strict_types=1);

namespace CodeCollabTest\Unit\Http\Request;

use CodeCollab\Http\Request\Request;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    protected $baseRequestData;

    protected function setUp()
    {
        $this->baseRequestData = [
            'server'  => [
                'REQUEST_URI'     => '/',
                'SERVER_PROTOCOL' => 'HTTP/1.1',
                'SERVER_NAME'     => 'codecollab.com',
                'SERVER_PORT'     => '80',
            ],
            'get'     => [],
            'post'    => [],
            'files'   => [],
            'cookies' => [],
            'input'   => '',
        ];
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::server
     */
    public function testServerWithoutBeingSet()
    {
        $request = new Request(
            $this->baseRequestData['server'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame('', $request->server('foo'));
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::processServerVariables
     * @covers CodeCollab\Http\Request\Request::server
     */
    public function testServerWithBeingSet()
    {
        $request = new Request(
            $this->baseRequestData['server'] + ['foo' => 'bar'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame('bar', $request->server('foo'));
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::processServerVariables
     * @covers CodeCollab\Http\Request\Request::server
     */
    public function testServerWithRequestUri()
    {
        $request = new Request(
            $this->baseRequestData['server'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame('/', $request->server('REQUEST_URI'));
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::processServerVariables
     * @covers CodeCollab\Http\Request\Request::server
     */
    public function testServerWithRequestUriPath()
    {
        $request = new Request(
            $this->baseRequestData['server'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame('/', $request->server('REQUEST_URI_PATH'));
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::processServerVariables
     * @covers CodeCollab\Http\Request\Request::server
     */
    public function testServerWithProtocol()
    {
        $request = new Request(
            $this->baseRequestData['server'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame('1.1', $request->server('SERVER_PROTOCOL'));
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::processServerVariables
     * @covers CodeCollab\Http\Request\Request::serverArray
     */
    public function testServerArray()
    {
        $request = new Request(
            $this->baseRequestData['server'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $server = array_merge($this->baseRequestData['server'], ['SERVER_PROTOCOL' => '1.1', 'REQUEST_URI_PATH' => '/']);

        $this->assertSame($server, $request->serverArray());
    }

   /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::header
     */
    public function testHeaderWithoutBeingSet()
    {
        $request = new Request(
            $this->baseRequestData['server'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame('', $request->header('foo'));
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::processServerVariables
     * @covers CodeCollab\Http\Request\Request::header
     */
    public function testHeaderWithBeingSet()
    {
        $request = new Request(
            $this->baseRequestData['server'] + ['HTTP_foo' => 'bar'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame('bar', $request->header('foo'));
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::processServerVariables
     * @covers CodeCollab\Http\Request\Request::header
     */
    public function testHeaderConvertsUnderscoresToDashes()
    {
        $request = new Request(
            $this->baseRequestData['server'] + ['HTTP_foo_bar_baz' => 'bar'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame('bar', $request->header('foo-bar-baz'));
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::processServerVariables
     * @covers CodeCollab\Http\Request\Request::header
     */
    public function testHeaderContentLength()
    {
        $request = new Request(
            $this->baseRequestData['server'] + ['CONTENT_LENGTH' => 'bar'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame('bar', $request->header('CONTENT-LENGTH'));
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::processServerVariables
     * @covers CodeCollab\Http\Request\Request::header
     */
    public function testHeaderContentType()
    {
        $request = new Request(
            $this->baseRequestData['server'] + ['CONTENT_TYPE' => 'bar'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame('bar', $request->header('CONTENT-TYPE'));
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::processServerVariables
     * @covers CodeCollab\Http\Request\Request::headerArray
     */
    public function testHeaderArray()
    {
        $request = new Request(
            $this->baseRequestData['server'] + ['HTTP_FOOBAR' => 'bar'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame(['FOOBAR' => 'bar'], $request->headerArray());
    }

   /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::get
     */
    public function testGetWithoutBeingSet()
    {
        $request = new Request(
            $this->baseRequestData['server'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame('', $request->get('foo'));
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::get
     */
    public function testGetWithBeingSet()
    {
        $request = new Request(
            $this->baseRequestData['server'],
            $this->baseRequestData['get'] + ['foo' => 'bar'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame('bar', $request->get('foo'));
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::getArray
     */
    public function testGetArray()
    {
        $request = new Request(
            $this->baseRequestData['server'],
            $this->baseRequestData['get'] + ['foo' => 'bar'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame(['foo' => 'bar'], $request->getArray());
    }

   /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::post
     */
    public function testPostWithoutBeingSet()
    {
        $request = new Request(
            $this->baseRequestData['server'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame('', $request->post('foo'));
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::post
     */
    public function testPostWithBeingSet()
    {
        $request = new Request(
            $this->baseRequestData['server'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'] + ['foo' => 'bar'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame('bar', $request->post('foo'));
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::postArray
     */
    public function testPostArray()
    {
        $request = new Request(
            $this->baseRequestData['server'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'] + ['foo' => 'bar'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame(['foo' => 'bar'], $request->postArray());
    }

   /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::files
     */
    public function testFilesWithoutBeingSet()
    {
        $request = new Request(
            $this->baseRequestData['server'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame([], $request->files('foo'));
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::files
     */
    public function testFilesWithBeingSet()
    {
        $request = new Request(
            $this->baseRequestData['server'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'] + ['foo' => ['bar' => 'baz']],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame(['bar' => 'baz'], $request->files('foo'));
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::filesArray
     */
    public function testFilesArray()
    {
        $request = new Request(
            $this->baseRequestData['server'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'] + ['foo' => ['bar' => 'baz']],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame(['foo' => ['bar' => 'baz']], $request->filesArray());
    }

   /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::cookie
     */
    public function testCookiesWithoutBeingSet()
    {
        $request = new Request(
            $this->baseRequestData['server'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame('', $request->cookie('foo'));
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::cookie
     */
    public function testCookiesWithBeingSet()
    {
        $request = new Request(
            $this->baseRequestData['server'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'] + ['foo' => 'bar'],
            $this->baseRequestData['input']
        );

        $this->assertSame('bar', $request->cookie('foo'));
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::cookieArray
     */
    public function testCookiesArray()
    {
        $request = new Request(
            $this->baseRequestData['server'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'] + ['foo' => 'bar'],
            $this->baseRequestData['input']
        );

        $this->assertSame(['foo' => 'bar'], $request->cookieArray());
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::getBody
     */
    public function testGetBody()
    {
        $request = new Request(
            $this->baseRequestData['server'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            'foo'
        );

        $this->assertSame('foo', $request->getBody());
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::isEncrypted
     */
    public function testIsEncryptedNoHttpsHeader()
    {
        $request = new Request(
            $this->baseRequestData['server'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertFalse($request->isEncrypted());
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::isEncrypted
     */
    public function testIsEncryptedHttpsHeaderContainsOff()
    {
        $request = new Request(
            $this->baseRequestData['server'] + ['HTTPS' => 'off'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertFalse($request->isEncrypted());
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::processServerVariables
     * @covers CodeCollab\Http\Request\Request::isEncrypted
     */
    public function testIsEncryptedHttpsEnabled()
    {
        $request = new Request(
            $this->baseRequestData['server'] + ['HTTPS' => 'on'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertTrue($request->isEncrypted());
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::processServerVariables
     * @covers CodeCollab\Http\Request\Request::server
     * @covers CodeCollab\Http\Request\Request::isEncrypted
     * @covers CodeCollab\Http\Request\Request::getBaseUrl
     */
    public function testGetBaseUrlNoSslStandardPort()
    {
        $request = new Request(
            $this->baseRequestData['server'],
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame('http://codecollab.com', $request->getBaseUrl());
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::processServerVariables
     * @covers CodeCollab\Http\Request\Request::server
     * @covers CodeCollab\Http\Request\Request::isEncrypted
     * @covers CodeCollab\Http\Request\Request::getBaseUrl
     */
    public function testGetBaseUrlSslStandardPort()
    {
        $request = new Request(
            array_merge($this->baseRequestData['server'], ['HTTPS' => 'on', 'SERVER_PORT' => '443']),
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame('https://codecollab.com', $request->getBaseUrl());
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::processServerVariables
     * @covers CodeCollab\Http\Request\Request::server
     * @covers CodeCollab\Http\Request\Request::isEncrypted
     * @covers CodeCollab\Http\Request\Request::getBaseUrl
     */
    public function testGetBaseUrlNoSslNonStandardPort()
    {
        $request = new Request(
            array_merge($this->baseRequestData['server'], ['SERVER_PORT' => '8080']),
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertSame('http://codecollab.com:8080', $request->getBaseUrl());
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::processServerVariables
     * @covers CodeCollab\Http\Request\Request::server
     * @covers CodeCollab\Http\Request\Request::startsWith
     */
    public function testStartsWithDoesStartWith()
    {
        $request = new Request(
            array_merge($this->baseRequestData['server'], ['REQUEST_URI' => '/foo/bar']),
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertTrue($request->startsWith('/foo'));
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::processServerVariables
     * @covers CodeCollab\Http\Request\Request::server
     * @covers CodeCollab\Http\Request\Request::startsWith
     */
    public function testStartsWithDoesNotStartWith()
    {
        $request = new Request(
            array_merge($this->baseRequestData['server'], ['REQUEST_URI' => '/foo/bar']),
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertFalse($request->startsWith('/xfoo'));
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::processServerVariables
     * @covers CodeCollab\Http\Request\Request::server
     * @covers CodeCollab\Http\Request\Request::matches
     */
    public function testMatchesDoesMatch()
    {
        $request = new Request(
            array_merge($this->baseRequestData['server'], ['REQUEST_URI' => '/foo/bar']),
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertTrue($request->startsWith('/foo/bar'));
    }

    /**
     * @covers CodeCollab\Http\Request\Request::__construct
     * @covers CodeCollab\Http\Request\Request::processServerVariables
     * @covers CodeCollab\Http\Request\Request::server
     * @covers CodeCollab\Http\Request\Request::matches
     */
    public function testMatchesDoesNotMatch()
    {
        $request = new Request(
            array_merge($this->baseRequestData['server'], ['REQUEST_URI' => '/foo/bar']),
            $this->baseRequestData['get'],
            $this->baseRequestData['post'],
            $this->baseRequestData['files'],
            $this->baseRequestData['cookies'],
            $this->baseRequestData['input']
        );

        $this->assertFalse($request->startsWith('/foo/xbar'));
    }
}
