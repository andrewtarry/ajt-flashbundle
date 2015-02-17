<?php
namespace AJT\FlashBundle\Tests\DependencyInjection\CompilerPass;

use AJT\FlashBundle\DependencyInjection\CompilerPass\CoreCssPass;
use Mockery as m;

class CoreCssPassTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var \Mockery\MockInterface
     */
    private $builder, $definition;

    public function setUp()
    {
        $this->builder = m::mock('Symfony\Component\DependencyInjection\ContainerBuilder');
        $this->definition = m::mock('Symfony\Component\DependencyInjection\Definition');
    }

    public function tearDown()
    {
        m::close();
    }

    /**
     * @test
     */
    public function noDefinition()
    {
        $this->builder->shouldReceive('hasDefinition')->once()->andReturn(false);

        $this->getPass()->process($this->builder);
    }

    /**
     * @test
     */
    public function noParameter()
    {
        $this->builder->shouldReceive('hasDefinition')->once()->andReturn(true);
        $this->builder->shouldReceive('hasParameter')->once()->andReturn(false);

        $this->getPass()->process($this->builder);
    }

    /**
     * @test
     */
    public function notArray()
    {
        $this->builder->shouldReceive('hasDefinition')->once()->andReturn(true);
        $this->builder->shouldReceive('hasParameter')->once()->andReturn(true);
        $this->builder->shouldReceive('getDefinition')->once()->andReturn($this->definition);
        $this->builder->shouldReceive('getParameter')->once()->andReturnNull();

        $this->getPass()->process($this->builder);
    }

    /**
     * @test
     */
    public function loadTypes()
    {
        $this->builder->shouldReceive('hasDefinition')->once()->andReturn(true);
        $this->builder->shouldReceive('hasParameter')->once()->andReturn(true);
        $this->builder->shouldReceive('getDefinition')->once()->andReturn($this->definition);
        $this->builder->shouldReceive('getParameter')->once()->andReturn(array(
            'success' => 'alert-success',
            'error'   => 'alert-danger',
            'info'    => 'alert-info',
            'warning' => 'alert-warning'
        ));

        $this->definition->shouldReceive('addMethodCall')->times(4)->andReturnNull();

        $this->getPass()->process($this->builder);
    }

    public function getPass()
    {
        return new CoreCssPass();
    }
}
