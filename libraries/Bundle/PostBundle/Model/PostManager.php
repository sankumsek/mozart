<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace  Mozart\Bundle\PostBundle\Model;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Mozart\Bundle\NucleusBundle\Model\AbstractManager;
use Symfony\Component\DependencyInjection\Container;

class PostManager extends AbstractManager implements PostManagerInterface
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var EntityRepository
     */
    protected $repository;

    /**
     * Constructor.
     *
     * @param EntityManager $em
     */
    public function __construct(Container $container)
    {
        parent::__construct($container);

        $this->em = $this->getEntityManager();
        $this->repository = $this->em->getRepository('MozartPostBundle:Post');
    }

    public function findOnePostById($id)
    {
        return $this->repository->findOneBy(array(
            'id' => $id,
        ));
    }

    public function findOnePostBySlug($slug)
    {
        return $this->repository->findOneBy(array(
            'slug' => $slug,
        ));
    }
}
