<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Bundle\NucleusBundle;

use Doctrine\DBAL\Types\Type;
use Mozart\Bundle\NucleusBundle\DependencyInjection\Security\Factory\WordpressFactory;
use Mozart\Bundle\NucleusBundle\Types\WordpressIdType;
use Mozart\Bundle\NucleusBundle\Types\WordpressMetaType;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class MozartNucleusBundle.
 */
class MozartNucleusBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        // Security
        $container->getExtension('security')->addSecurityListenerFactory(new WordpressFactory());
    }

    public function boot()
    {
        parent::boot();

        if (!Type::hasType(WordpressMetaType::NAME)) {
            Type::addType(WordpressMetaType::NAME, 'Mozart\Bundle\NucleusBundle\Types\WordpressMetaType');
        }

        if (!Type::hasType(WordpressIdType::NAME)) {
            Type::addType(WordpressIdType::NAME, 'Mozart\Bundle\NucleusBundle\Types\WordpressIdType');
        }
    }
}
