<?php
namespace AJT\FlashBundle\Tests\Event;

use AJT\FlashBundle\Event\FlashEvent;
use AJT\FlashBundle\Flash\FlashInterface;
use InvalidArgumentException;
use Mockery as m;

class FlashEventTest extends \PHPUnit_Framework_TestCase {

    /**
     * @test
     * @group unit
     */
    public function getters()
    {
        $message = 'a message';
        $event = new FlashEvent($message, FlashInterface::SUCCESS);

        $this->assertEquals($message, $event->getMessage());
        $this->assertEquals(FlashInterface::SUCCESS, $event->getType());
    }

    /**
     * @test
     * @group unit
     */
    public function invalidType()
    {
        $this->setExpectedException('InvalidArgumentException');
        new FlashEvent('', 'other');
    }


}
 