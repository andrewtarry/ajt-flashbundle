<?php
namespace AJT\FlashBundle\Loader;

use AJT\FlashBundle\Event\FlashEvent;
use AJT\FlashBundle\Flash\FlashInterface;

/**
 * Flash loader event listener
 *
 * @package AJT\FlashBundle\Loader
 */
class FlashLoader
{

    /**
     * @var FlashInterface
     */
    private $flash;

    /**
     * @param FlashInterface $flash
     */
    public function __construct(FlashInterface $flash)
    {
        $this->flash = $flash;
    }

    /**
     * @param FlashEvent $event
     */
    public function load(FlashEvent $event)
    {
        $this->flash->set($event->getMessage(), $event->getType());
    }

}
