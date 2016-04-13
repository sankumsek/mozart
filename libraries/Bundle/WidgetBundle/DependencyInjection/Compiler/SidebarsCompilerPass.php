<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

/**
 * Copyright 2014 Alexandru Furculita <alex@rhetina.com>.
 */
namespace Mozart\Bundle\WidgetBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class SidebarsCompilerPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('mozart.widget.sidebar_manager')) {
            return;
        }

        $definition = $container->getDefinition(
            'mozart.widget.sidebar_manager'
        );

        foreach ($container->findTaggedServiceIds('wordpress.sidebar') as $id => $attributes) {
            $definition->addMethodCall(
                'registerSidebar',
                array(new Reference($id))
            );
        }
    }
}
