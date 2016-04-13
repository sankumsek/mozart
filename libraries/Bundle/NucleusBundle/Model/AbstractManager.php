<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Bundle\NucleusBundle\Model;

use Symfony\Component\DependencyInjection\Container;

/**
 * Class AbstractManager.
 */
abstract class AbstractManager
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @return object
     */
    protected function getEntityManager()
    {
        $entityManagerName = $this->container->getParameter('wordpress.entity_manager');

        return $this->container->get('doctrine.orm.'.$entityManagerName.'_entity_manager');
    }
}
