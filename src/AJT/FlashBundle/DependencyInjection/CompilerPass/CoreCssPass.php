<?php
namespace AJT\FlashBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Add the core classes to the manager
 *
 * @package AJT\FlashBundle\DependencyInjection\CompilerPass
 */
class CoreCssPass implements CompilerPassInterface
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

        if(!$container->hasParameter('ajt.flash.config.core')) {
            return;
        }

        $coreCss = $container->getParameter('ajt.flash.config.core');
        $manager = $container->getDefinition('ajt.flash.type.manager');

        if(!is_array($coreCss)) {
            return;
        }

        foreach($coreCss as $type => $css) {
            $manager->addMethodCall('addType', array($type, $css));
        }
    }
}