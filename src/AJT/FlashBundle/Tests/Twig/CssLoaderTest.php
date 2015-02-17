<?php
namespace AJT\FlashBundle\Tests\Twig;

use AJT\FlashBundle\Twig\CssLoader;
use Mockery as m;

class CssLoaderTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var \Mockery\MockInterface
     */
    private $typeMap;

    public function setUp()
    {
        $this->typeMap = m::mock('AJT\FlashBundle\Type\TypeMapInterface');
    }

    public function tearDown()
    {
        m::close();
    }

    /**
     * @test
     * @dataProvider cssProvider
     */
    public function getCss($default, $type, $expected)
    {
        $this->typeMap->shouldReceive('getDefaultClass')->once()->andReturn($default);
        $this->typeMap->shouldReceive('typeLocator')->once()->andReturn($type);

        $this->assertEquals($expected, $this->getTwig()->getCss('myType'));
    }

    public function cssProvider()
    {
        return array(
            array('default', 'myType', 'default myType'),
            array('', 'myType', 'myType'),
            array(null, 'myType', 'myType'),
            array('default', '', 'default'),
            array(null, '', '')
        );
    }

    /**
     * @test
     */
    public function getFunctions()
    {
        $this->assertCount(1, $this->getTwig()->getFunctions());
    }

    /**
     * @test
     */
    public function getExtensionName()
    {
        $this->assertEquals('ajt.flash.twig.css', $this->getTwig()->getName());
    }

    private function getTwig()
    {
        return new CssLoader($this->typeMap);
    }
}
