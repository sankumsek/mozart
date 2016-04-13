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
namespace Mozart\Bundle\ConfigBundle;

use Mozart\Bundle\ConfigBundle\DependencyInjection\Compiler\ConfigPageFieldGroupsCompilerPass;
use Mozart\Bundle\ConfigBundle\DependencyInjection\Compiler\ConfigPagesCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class MozartConfigBundle.
 */
class MozartConfigBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new ConfigPagesCompilerPass());
        $container->addCompilerPass(new ConfigPageFieldGroupsCompilerPass());
    }

    /**
     * Boot bundle.
     */
    public function boot()
    {
    }
}
