<?php declare(strict_types=1);

namespace CodeCollabTest\Unit\Http\Cookie;

use CodeCollab\Http\Cookie\Factory;
use CodeCollab\Encryption\Encryptor;
use CodeCollab\Http\Cookie\Cookie;

class FactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers CodeCollab\Http\Cookie\Factory::__construct
     * @covers CodeCollab\Http\Cookie\Factory::build
     */
    public function testBuild()
    {
        $encryptor = $this->createMock(Encryptor::class);

        $this->assertInstanceof(
            Cookie::class,
            (new Factory($encryptor, '.example.com', true))->build('foo', 'bar', new \DateTime())
        );
    }
}
