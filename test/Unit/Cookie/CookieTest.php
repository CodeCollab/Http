<?php declare(strict_types=1);

namespace CodeCollabTest\Unit\Http\Cookie;

use CodeCollab\Http\Cookie\Cookie;

class CookieTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers CodeCollab\Http\Cookie\Cookie::__construct
     * @covers CodeCollab\Http\Cookie\Cookie::send
     */
    public function testSend()
    {
        $this->setExpectedExceptionRegExp(
            'PHPUnit_Framework_Error_Warning',
            '/Cannot modify header information - headers already sent by/'
        );

        $this->assertNull((new Cookie('foo', 'bar', new \DateTime(), '/', '.example.com', true))->send());
    }
}
