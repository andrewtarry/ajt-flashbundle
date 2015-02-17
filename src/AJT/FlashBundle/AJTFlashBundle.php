<?php
namespace AJT\FlashBundle;

use AJT\FlashBundle\DependencyInjection\CompilerPass\CoreCssPass;
use AJT\FlashBundle\DependencyInjection\CompilerPass\CustomCssPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AJTFlashBundle extends Bundle
{

    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new CoreCssPass());
        $container->addCompilerPass(new CustomCssPass());
    }
} 