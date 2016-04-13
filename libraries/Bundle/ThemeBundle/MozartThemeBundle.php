<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Bundle\ThemeBundle;

use Mozart\Bundle\ThemeBundle\DependencyInjection\Compiler\ThemesCompilerPass;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MozartThemeBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new ThemesCompilerPass());
    }

    public function boot()
    {
        //        if (defined( 'WP_USE_THEMES' ) && WP_USE_THEMES) {
//            add_action( 'template_redirect', array( $this->container->get( 'mozart.template.loader' ), 'load' ), 999 );
//        }
    }
}
