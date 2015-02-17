<?php
namespace AJT\FlashBundle\Tests\Loader;

use AJT\FlashBundle\Event\FlashEvent;
use AJT\FlashBundle\Flash\FlashInterface;
use AJT\FlashBundle\Loader\FlashLoader;
use Mockery as m;

class FlashLoaderTest extends \PHPUnit_Framework_TestCase {


    /**
     * @var \Mockery\MockInterface
     */
    private $flash;

    public function setUp()
    {
        $this->flash = m::mock('AJT\FlashBundle\Flash\FlashInterface');
    }

    /**
     * @test
     * @group unit
     */
    public function loadFlash()
    {
        $event = m::mock('AJT\FlashBundle\Event\FlashEvent');
        $event->shouldReceive('getMessage')->once()->andReturn('A Message');
        $event->shouldReceive('getType')->once()->andReturn(FlashInterface::SUCCESS);

        $this->flash->shouldReceive('set')->once()->andReturnNull();

        $loader = new FlashLoader($this->flash);
        $loader->load($event);
    }

}
 