<?php
namespace AJT\FlashBundle\Type;

/**
 * Map types from the configuration to the types set
 *
 * @package AJT\FlashBundle\Type
 */
class TypeMapper implements TypeMapInterface
{

    /**
     * @var array
     */
    private $map = array();

    /**
     * De
     *
     * @var null|string
     */
    private $defaultClass = null;

    /**
     * @param null|string $defaultClasss
     */
    public function __construct($defaultClasss = null)
    {
        $this->defaultClass = $defaultClasss;
    }

    /**
     * Add a new type to the type mapper
     *
     * @param string $key
     * @param string $value
     */
    public function addType($key, $value)
    {
        $this->map[$key] = $value;
    }

    /**
     * Get the type based on the key
     *
     * @param $key
     * @return null|string
     */
    public function typeLocator($key)
    {
        return array_key_exists($key, $this->map) ? $this->map[$key] : null;
    }

    /**
     * @return null|string
     */
    public function getDefaultClass()
    {
        return $this->defaultClass;
    }

}