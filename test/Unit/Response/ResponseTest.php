<?php declare(strict_types=1);

namespace CodeCollabTest\Unit\Http\Response;

use CodeCollab\Http\Response\Response;
use CodeCollab\Http\Response\StatusCode;
use CodeCollab\Http\Request\Request;
use CodeCollab\Http\Cookie\Factory as CookieFactory;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers CodeCollab\Http\Response\Response::__construct
     * @covers CodeCollab\Http\Response\Response::setContent
     */
    public function testSetContent()
    {
        $request = new class extends Request {
            public function __construct() {}
        };

        $statusCode = new class extends StatusCode {};

        $cookieFactory = new class extends CookieFactory {
            public function __construct() {}
        };

        $this->assertNull((new Response($request, $statusCode, $cookieFactory))->setContent('foo'));
    }

    /**
     * @covers CodeCollab\Http\Response\Response::__construct
     * @covers CodeCollab\Http\Response\Response::setStatusCode
     */
    public function testSetStatusCodeWithoutTextualRepresentation()
    {
        $request = new class extends Request {
            public function __construct() {}
        };

        $statusCode = new class extends StatusCode {};

        $cookieFactory = new class extends CookieFactory {
            public function __construct() {}
        };

        $this->assertNull((new Response($request, $statusCode, $cookieFactory))->setStatusCode(200));
    }

    /**
     * @covers CodeCollab\Http\Response\Response::__construct
     * @covers CodeCollab\Http\Response\Response::setStatusCode
     */
    public function testSetStatusCodeWithTextualRepresentation()
    {
        $request = new class extends Request {
            public function __construct() {}
        };

        $statusCode = new class extends StatusCode {};

        $cookieFactory = new class extends CookieFactory {
            public function __construct() {}
        };

        $this->assertNull((new Response($request, $statusCode, $cookieFactory))->setStatusCode(200, 'Foo'));
    }

    /**
     * @covers CodeCollab\Http\Response\Response::__construct
     * @covers CodeCollab\Http\Response\Response::addHeader
     */
    public function testAddHeader()
    {
        $request = new class extends Request {
            public function __construct() {}
        };

        $statusCode = new class extends StatusCode {};

        $cookieFactory = new class extends CookieFactory {
            public function __construct() {}
        };

        $this->assertNull((new Response($request, $statusCode, $cookieFactory))->addHeader('foo', 'bar'));
    }

    /**
     * @covers CodeCollab\Http\Response\Response::__construct
     * @covers CodeCollab\Http\Response\Response::addCookie
     */
    public function testAddCookie()
    {
        $request = new class extends Request {
            public function __construct() {}
        };

        $statusCode = new class extends StatusCode {};

        $cookieFactory = new CookieFactory('.example.com', true);

        $this->assertNull(
            (new Response($request, $statusCode, $cookieFactory))->addCookie('foo', 'bar', new \DateTime())
        );
    }

    /**
     * @covers CodeCollab\Http\Response\Response::__construct
     * @covers CodeCollab\Http\Response\Response::send
     */
    public function testSendWithoutCookiesOrHeadersAndBody()
    {
        $request = new class extends Request {
            public function __construct() {}
        };

        $statusCode = new class extends StatusCode {};

        $cookieFactory = new class extends CookieFactory {
            public function __construct() {}
        };

        $response = new Response($request, $statusCode, $cookieFactory);

        $this->setExpectedExceptionRegExp(
            'PHPUnit_Framework_Error_Warning',
            '/Cannot modify header information - headers already sent by/'
        );

        $this->assertSame('', $response->send());
    }

    /**
     * @covers CodeCollab\Http\Response\Response::__construct
     * @covers CodeCollab\Http\Response\Response::send
     */
    public function testSendWithoutCookiesOrHeadersHeadRequest()
    {
        $request = new class extends Request {
            public function __construct() {}

            public function server(string $key): string
            {
                if ($key === 'REQUEST_METHOD') {
                    return 'HEAD';
                }

                return parent::server($key);
            }
        };

        $statusCode = new class extends StatusCode {};

        $cookieFactory = new class extends CookieFactory {
            public function __construct() {}
        };

        $response = new Response($request, $statusCode, $cookieFactory);
        $response->setContent('foo');

        $this->setExpectedExceptionRegExp(
            'PHPUnit_Framework_Error_Warning',
            '/Cannot modify header information - headers already sent by/'
        );

        $this->assertSame('', $response->send());
    }

    /**
     * @covers CodeCollab\Http\Response\Response::__construct
     * @covers CodeCollab\Http\Response\Response::send
     */
    public function testSendWithoutCookiesOrHeaders()
    {
        $request = new class extends Request {
            public function __construct() {}
        };

        $statusCode = new class extends StatusCode {};

        $cookieFactory = new class extends CookieFactory {
            public function __construct() {}
        };

        $response = new Response($request, $statusCode, $cookieFactory);
        $response->setContent('foo');

        $this->setExpectedExceptionRegExp(
            'PHPUnit_Framework_Error_Warning',
            '/Cannot modify header information - headers already sent by/'
        );

        $this->assertSame('foo', $response->send());
    }

    /**
     * @covers CodeCollab\Http\Response\Response::__construct
     * @covers CodeCollab\Http\Response\Response::addCookie
     * @covers CodeCollab\Http\Response\Response::sendCookies
     * @covers CodeCollab\Http\Response\Response::addHeader
     * @covers CodeCollab\Http\Response\Response::sendHeaders
     * @covers CodeCollab\Http\Response\Response::send
     */
    public function testSendWithCookiesAndHeaders()
    {
        $request = new class extends Request {
            public function __construct() {}
        };

        $statusCode = new class extends StatusCode {};

        $cookieFactory = new CookieFactory('.example.com', true);

        $response = new Response($request, $statusCode, $cookieFactory);

        $response->addCookie('foo', 'bar', new \DateTime());
        $response->addHeader('foo', 'bar');
        $response->setContent('foo');

        $this->setExpectedExceptionRegExp(
            'PHPUnit_Framework_Error_Warning',
            '/Cannot modify header information - headers already sent by/'
        );

        $this->assertSame('foo', $response->send());
    }
}
