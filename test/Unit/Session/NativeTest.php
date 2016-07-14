<?php declare(strict_types=1);

namespace CodeCollabTest\Unit\Http\Session;

use CodeCollab\Http\Session\Native;
use CodeCollab\Http\Session\Session;

class NativeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers CodeCollab\Http\Session\Native::__construct
     */
    public function testImplementsCorrectInterface()
    {
        $this->expectException(\PHPUnit_Framework_Error_Warning::class);
        $this->expectExceptionMessageRegExp('/Cannot send session cookie - headers already sent by/');

        $this->assertInstanceOf(Session::class, new Native('/', '.example.com', true));
    }

    /**
     * @covers CodeCollab\Http\Session\Native::__construct
     * @covers CodeCollab\Http\Session\Native::get
     */
    public function testGetWithoutBeingSet()
    {
        $this->expectException(\PHPUnit_Framework_Error_Notice::class);
        $this->expectExceptionMessageRegExp('/A session had already been started/');

        $this->assertNull((new Native('/', '.example.com', true))->get('foo'));
    }

    /**
     * @covers CodeCollab\Http\Session\Native::__construct
     * @covers CodeCollab\Http\Session\Native::set
     * @covers CodeCollab\Http\Session\Native::get
     */
    public function testSet()
    {
        $this->expectException(\PHPUnit_Framework_Error_Notice::class);
        $this->expectExceptionMessageRegExp('/A session had already been started/');

        $session = new Native('/', '.example.com', true);

        $this->assertNull($session->set('foo', 'bar'));

        $this->assertSame('bar', $session->set('foo'));
    }

    /**
     * @covers CodeCollab\Http\Session\Native::__construct
     * @covers CodeCollab\Http\Session\Native::exists
     */
    public function testExistsDoesntExist()
    {
        $this->expectException(\PHPUnit_Framework_Error_Notice::class);
        $this->expectExceptionMessageRegExp('/A session had already been started/');

        $session = new Native('/', '.example.com', true);

        $this->assertFalse($session->get('foo'));
    }

    /**
     * @covers CodeCollab\Http\Session\Native::__construct
     * @covers CodeCollab\Http\Session\Native::set
     * @covers CodeCollab\Http\Session\Native::exists
     */
    public function testExistsDoesExist()
    {
        $this->expectException(\PHPUnit_Framework_Error_Notice::class);
        $this->expectExceptionMessageRegExp('/A session had already been started/');

        $session = new Native('/', '.example.com', true);

        $session->set('foo', 'bar');

        $this->assertTrue($session->get('foo'));
    }

    /**
     * @covers CodeCollab\Http\Session\Native::__construct
     * @covers CodeCollab\Http\Session\Native::set
     * @covers CodeCollab\Http\Session\Native::unset
     */
    public function testUnset()
    {
        $this->expectException(\PHPUnit_Framework_Error_Notice::class);
        $this->expectExceptionMessageRegExp('/A session had already been started/');

        $session = new Native('/', '.example.com', true);

        $session->set('foo', 'bar');

        $this->assertNull($session->unset('foo'));
    }

    /**
     * @covers CodeCollab\Http\Session\Native::__construct
     * @covers CodeCollab\Http\Session\Native::destroy
     */
    public function testDestroy()
    {
        $this->expectException(\PHPUnit_Framework_Error_Notice::class);
        $this->expectExceptionMessageRegExp('/A session had already been started/');

        $session = new Native('/', '.example.com', true);

        $this->assertNull($session->destroy());
    }

    /**
     * @covers CodeCollab\Http\Session\Native::__construct
     * @covers CodeCollab\Http\Session\Native::regenerate
     */
    public function testRegenerate()
    {
        $this->expectException(\PHPUnit_Framework_Error_Notice::class);
        $this->expectExceptionMessageRegExp('/A session had already been started/');

        $session = new Native('/', '.example.com', true);

        $this->assertNull($session->regenerate());
    }
}
