<?php
namespace AJT\FlashBundle\Tests\Type;

use AJT\FlashBundle\Type\TypeMapper;
use Mockery as m;

class TypeMapperTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function getTypes()
    {
        $manager = new TypeMapper();
        $manager->addType('one', 'a');
        $manager->addType('two', 'b');

        $this->assertEquals('a', $manager->typeLocator('one'));
        $this->assertEquals('b', $manager->typeLocator('two'));
        $this->assertNull($manager->typeLocator('three'));
    }

    /**
     * @test
     */
    public function defaultClass()
    {
        $manager = new TypeMapper('myClass');

        $this->assertEquals('myClass', $manager->getDefaultClass());
    }

}
