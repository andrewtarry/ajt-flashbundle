<?php

namespace AJT\FlashBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $treeBuilder->root('ajt_flash')
            ->children()
                ->scalarNode('default_class')->info('CSS class to be added to all flash')->defaultValue('alert')->end()
                ->arrayNode('core')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('success')->isRequired()->info('CSS class to be added to success')->defaultValue('alert-success')->end()
                        ->scalarNode('error')->isRequired()->info('CSS class to be added to error')->defaultValue('alert-danger')->end()
                        ->scalarNode('info')->isRequired()->info('CSS class to be added to info')->defaultValue('alert-info')->end()
                        ->scalarNode('warning')->isRequired()->info('CSS class to be added to warning')->defaultValue('alert-warning')->end()
                    ->end()
                ->end()
                ->arrayNode('custom')
                    ->prototype('array')
                    ->info('Custom css to be applied to non-core flash types')
                        ->children()
                            ->scalarNode('type')->isRequired()->end()
                            ->scalarNode('css')->isRequired()->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
