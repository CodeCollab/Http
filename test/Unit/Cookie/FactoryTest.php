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
        $this->assertInstanceof(
            'CodeCollab\Http\Cookie\Cookie',
            (new Factory('.example.com', true))->build('foo', 'bar', new \DateTime())
        );
    }
}
