<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Bundle\ShortcodeBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class ShortcodeCompilerPass.
 */
class ShortcodeCompilerPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('mozart.shortcode.shortcode_chain')) {
            return;
        }

        $definition = $container->getDefinition(
            'mozart.shortcode.shortcode_chain'
        );

        foreach ($container->findTaggedServiceIds('wordpress.shortcode') as $id => $attributes) {
            $definition->addMethodCall(
                'addShortcode',
                array(new Reference($id))
            );
        }
    }
}
