<?php declare(strict_types=1);

namespace CodeCollabTest\Unit\Http\Session;

class PhpUnitUnsetBugTest extends \PHPUnit_Framework_TestCase
{
    public function testMockSessionBasedOnInterfaceMocksAllMethodsIncludingUnset()
    {
        $session = $this->getMock('CodeCollab\Http\Session\Session');
    }
}
