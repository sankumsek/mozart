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
namespace Mozart\Bundle\ShortcodeBundle;

use Mozart\Bundle\ShortcodeBundle\DependencyInjection\Compiler\ShortcodeCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MozartShortcodeBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        // Shortcode
        $container->addCompilerPass(new ShortcodeCompilerPass());
    }

    public function boot()
    {
    }
}
