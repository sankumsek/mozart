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

interface PostMetaManagerInterface
{
    public function addMeta(Post $post, PostMeta $meta);

    public function findAllMetasByPost(Post $post);

    public function findMetasBy(array $criteria);

    public function findOneMetaBy(array $criteria);
}
