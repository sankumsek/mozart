<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace  Mozart\Bundle\UserBundle\Model;

interface UserMetaManagerInterface
{
    public function addMeta(User $user, UserMeta $meta);

    public function findAllMetasByUser(User $user);

    public function findMetasBy(array $criteria);

    public function findOneMetaBy(array $criteria);
}
