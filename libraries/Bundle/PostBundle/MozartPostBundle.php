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
namespace Mozart\Bundle\PostBundle;

use Mozart\Bundle\PostBundle\DependencyInjection\Compiler\PostTypesCompilerPass;
use Mozart\Bundle\PostBundle\DependencyInjection\Compiler\UserCapabilitiesPerPostTypeCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class MozartPostBundle.
 */
class MozartPostBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new PostTypesCompilerPass());
        $container->addCompilerPass(new UserCapabilitiesPerPostTypeCompilerPass());
    }

    /**
     *
     */
    public function boot()
    {
    }
}
