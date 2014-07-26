<?php
/**
 * Copyright 2014 Alexandru Furculita <alex@rhetina.com>
 */

namespace Mozart\Bundle\ConfigBundle;

use Mozart\Bundle\ConfigBundle\DependencyInjection\Compiler\OptionExtensionsCompilerPass;
use Mozart\Bundle\ConfigBundle\DependencyInjection\Compiler\ConfigSectionsCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class MozartConfigBundle
 *
 * @package Mozart\Bundle\ConfigBundle
 */
class MozartConfigBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build( $container );
        $container->addCompilerPass( new ConfigSectionsCompilerPass() );
    }

    /**
     * Boot bundle
     */
    public function boot()
    {
        $this->container->get( 'mozart.config.controller' )->initOptionManager( );
    }
}