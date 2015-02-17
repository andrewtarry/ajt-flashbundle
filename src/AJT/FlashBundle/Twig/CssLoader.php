<?php
namespace AJT\FlashBundle\Twig;

use AJT\FlashBundle\Type\TypeMapInterface;

/**
 * Get the css for the flash
 * @package AJT\FlashBundle\Twig
 */
class CssLoader extends \Twig_Extension
{

    /**
     * @var TypeMapInterface
     */
    private $typeMap;

    /**
     * @param TypeMapInterface $typeMap
     */
    public function __construct(TypeMapInterface $typeMap){
        $this->typeMap = $typeMap;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('ajt_flash_css', array($this, 'getCss'))
        );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'ajt.flash.twig.css';
    }

    /**
     * @param string $type
     * @return string
     */
    public function getCss($type)
    {
        $defaultClass = $this->typeMap->getDefaultClass();
        $mapped = $this->typeMap->typeLocator($type);
        $css = implode(' ', array($defaultClass, $mapped));
        return trim($css);
    }
}
