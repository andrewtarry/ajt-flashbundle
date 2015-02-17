<?php
namespace AJT\FlashBundle\Event;

use AJT\FlashBundle\Flash\FlashInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Flash message to display
 *
 * @package AJT\FlashBundle\Event
 */
class FlashEvent extends Event
{

    /**
     * Event name listen for
     */
    const EVENT = 'flash.set';

    /**
     * Message to display
     *
     * @var String
     */
    private $message;

    /**
     * Type of the message
     *
     * Must be a constant in FlashInterface
     *
     * @var string
     */
    private $type;

    /**
     * @param string $message
     * @param string $type
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($message, $type)
    {
        $this->message = $message;
        $this->validateType($type);
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     *
     * @throws \InvalidArgumentException
     */
    private function validateType($type)
    {
        $reflectedFlash = new \ReflectionClass('AJT\FlashBundle\Flash\FlashInterface');
        $constants = $reflectedFlash->getConstants();

        if(in_array($type, $constants))
        {
            $this->type = $type;
        }else{
            throw new \InvalidArgumentException('Message type invalid');
        }
    }

} 