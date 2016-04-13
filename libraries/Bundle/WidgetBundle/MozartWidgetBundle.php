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
namespace Mozart\Bundle\WidgetBundle;

use Mozart\Bundle\WidgetBundle\DependencyInjection\Compiler\SidebarsCompilerPass;
use Mozart\Bundle\WidgetBundle\DependencyInjection\Compiler\WidgetsCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class MozartWidgetBundle.
 */
class MozartWidgetBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new WidgetsCompilerPass());
        $container->addCompilerPass(new SidebarsCompilerPass());
    }

    public function boot()
    {
    }
}
