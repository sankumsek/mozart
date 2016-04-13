<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace  Mozart\Bundle\BlogBundle\Model;

use Mozart\Bundle\NucleusBundle\Doctrine\WordpressEntityManager;

class Blog implements BlogInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var WordpressEntityManager
     */
    protected $entityManager;

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param WordpressEntityManager $manager
     */
    public function setEntityManager(WordpressEntityManager $manager)
    {
        $this->entityManager = $manager;
    }

    /**
     * @return WordpressEntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }
}
