<?php
namespace AJT\FlashBundle\Type;

/**
 * Map types from the configuration to the types set
 *
 * @package AJT\FlashBundle\Type
 */
interface TypeMapInterface
{
    /**
     * Get the type based on the key
     *
     * @param $key
     * @return null|string
     */
    public function typeLocator($key);

    /**
     * @return null|string
     */
    public function getDefaultClass();
}
