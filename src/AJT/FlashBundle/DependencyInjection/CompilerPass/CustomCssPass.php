<?php
namespace AJT\FlashBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Add the custom css to the css manager
 *
 * @package AJT\FlashBundle\DependencyInjection\CompilerPass
 */
class CustomCssPass implements CompilerPassInterface
{

    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     *
     * @api
     */
    public function process(ContainerBuilder $container)
    {
        if(!$container->hasDefinition('ajt.flash.type.manager')) {
            return;
        }

        if(!$container->hasParameter('ajt.flash.config.custom')) {
            return;
        }

        $customCss = $container->getParameter('ajt.flash.config.custom');
        $manager = $container->getDefinition('ajt.flash.type.manager');

        if(!is_array($customCss)) {
            return;
        }

        foreach($customCss as $css) {
            $manager->addMethodCall('addType', array($css['type'], $css['css']));
        }
    }
}