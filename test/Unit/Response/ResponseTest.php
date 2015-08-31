<?php declare(strict_types=1);

namespace CodeCollabTest\Unit\Http\Response;

use CodeCollab\Http\Response\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers CodeCollab\Http\Response\Response::__construct
     * @covers CodeCollab\Http\Response\Response::setContent
     */
    public function testSetContent()
    {
        $request = $this->getMockBuilder('CodeCollab\Http\Request\Request')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $statusCode = $this->getMock('CodeCollab\Http\Response\StatusCode');

        $cookieFactory = $this->getMockBuilder('CodeCollab\Http\Cookie\Factory')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $this->assertNull((new Response($request, $statusCode, $cookieFactory))->setContent('foo'));
    }

    /**
     * @covers CodeCollab\Http\Response\Response::__construct
     * @covers CodeCollab\Http\Response\Response::setStatusCode
     */
    public function testSetStatusCodeWithoutTextualRepresentation()
    {
        $request = $this->getMockBuilder('CodeCollab\Http\Request\Request')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $statusCode = $this->getMock('CodeCollab\Http\Response\StatusCode');

        $cookieFactory = $this->getMockBuilder('CodeCollab\Http\Cookie\Factory')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $this->assertNull((new Response($request, $statusCode, $cookieFactory))->setStatusCode(200));
    }

    /**
     * @covers CodeCollab\Http\Response\Response::__construct
     * @covers CodeCollab\Http\Response\Response::setStatusCode
     */
    public function testSetStatusCodeWithTextualRepresentation()
    {
        $request = $this->getMockBuilder('CodeCollab\Http\Request\Request')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $statusCode = $this->getMock('CodeCollab\Http\Response\StatusCode');

        $cookieFactory = $this->getMockBuilder('CodeCollab\Http\Cookie\Factory')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $this->assertNull((new Response($request, $statusCode, $cookieFactory))->setStatusCode(200, 'Foo'));
    }

    /**
     * @covers CodeCollab\Http\Response\Response::__construct
     * @covers CodeCollab\Http\Response\Response::addHeader
     */
    public function testAddHeader()
    {
        $request = $this->getMockBuilder('CodeCollab\Http\Request\Request')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $statusCode = $this->getMock('CodeCollab\Http\Response\StatusCode');

        $cookieFactory = $this->getMockBuilder('CodeCollab\Http\Cookie\Factory')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $this->assertNull((new Response($request, $statusCode, $cookieFactory))->addHeader('foo', 'bar'));
    }

    /**
     * @covers CodeCollab\Http\Response\Response::__construct
     * @covers CodeCollab\Http\Response\Response::addCookie
     */
    public function testAddCookie()
    {
        $request = $this->getMockBuilder('CodeCollab\Http\Request\Request')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $statusCode = $this->getMock('CodeCollab\Http\Response\StatusCode');

        $cookieFactory = $this->getMockBuilder('CodeCollab\Http\Cookie\Factory')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $cookie = $this->getMockBuilder('CodeCollab\Http\Cookie\Cookie')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $cookieFactory
            ->expects($this->once())
            ->method('build')
            ->with($this->equalTo('foo'), $this->equalTo('bar'), $this->isInstanceOf('DateTime'))
            ->willReturn($cookie)
        ;

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
        $request = $this->getMockBuilder('CodeCollab\Http\Request\Request')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $statusCode = $this->getMock('CodeCollab\Http\Response\StatusCode');

        $cookieFactory = $this->getMockBuilder('CodeCollab\Http\Cookie\Factory')
            ->disableOriginalConstructor()
            ->getMock()
        ;

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
        $request = $this->getMockBuilder('CodeCollab\Http\Request\Request')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $statusCode = $this->getMock('CodeCollab\Http\Response\StatusCode');

        $cookieFactory = $this->getMockBuilder('CodeCollab\Http\Cookie\Factory')
            ->disableOriginalConstructor()
            ->getMock()
        ;

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
        $request = $this->getMockBuilder('CodeCollab\Http\Request\Request')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $statusCode = $this->getMock('CodeCollab\Http\Response\StatusCode');

        $cookieFactory = $this->getMockBuilder('CodeCollab\Http\Cookie\Factory')
            ->disableOriginalConstructor()
            ->getMock()
        ;

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
        $request = $this->getMockBuilder('CodeCollab\Http\Request\Request')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $statusCode = $this->getMock('CodeCollab\Http\Response\StatusCode');

        $cookie = $this->getMockBuilder('CodeCollab\Http\Cookie\Cookie')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $cookieFactory = $this->getMockBuilder('CodeCollab\Http\Cookie\Factory')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $cookieFactory
            ->expects($this->once())
            ->method('build')
            ->with($this->equalTo('foo'), $this->equalTo('bar'), $this->isInstanceOf('DateTime'))
            ->willReturn($cookie)
        ;

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
