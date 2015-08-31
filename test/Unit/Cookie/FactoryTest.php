<?php declare(strict_types=1);

namespace CodeCollabTest\Unit\Http\Cookie;

use CodeCollab\Http\Cookie\Factory;

class FactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers CodeCollab\Http\Cookie\Factory::__construct
     * @covers CodeCollab\Http\Cookie\Factory::build
     */
    public function testBuild()
    {
        $encryptor = $this->getMock('CodeCollab\Encryption\Encryptor');

        $this->assertInstanceof(
            'CodeCollab\Http\Cookie\Cookie',
            (new Factory($encryptor, '.example.com', true))->build('foo', 'bar', new \DateTime())
        );
    }
}
