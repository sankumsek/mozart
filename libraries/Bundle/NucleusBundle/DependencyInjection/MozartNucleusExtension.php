<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Bundle\NucleusBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class MozartNucleusExtension extends Extension
{
    /**
     * Loads the services based on your application configuration.
     *
     * @param array            $config
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        //
//        $processor = new Processor();
//        $configuration = new Configuration();
//        $configs = $processor->processConfiguration($configuration, $configs);
//
//        foreach ($configs['wp'] as $name => $array_value) {
//            foreach ($array_value as $value_name => $value) {
//                $container->setParameter('wp.' . $name . '.' . $value_name, $value);
//                $container->setParameter('wordpress.' . $name . '.' . $value_name, $value);
//            }
//        }

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $this->addClassesToCompile(array(
            )
        );
    }

    public function getAlias()
    {
        return 'mozart_nucleus';
    }
}
