<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Bundle\PostBundle\Model;

/**
 * Interface AttachmentManagerInterface.
 */
interface AttachmentManagerInterface
{
    /**
     * @param Post $post
     *
     * @return AttachmentInterface[]
     */
    public function findAttachmentsByPost(Post $post);

    /**
     * @param $id integer
     *
     * @return AttachmentInterface[]
     */
    public function findOneAttachmentById($id);

    /**
     * @param Post $post
     *
     * @return mixed
     */
    public function findFeaturedImageByPost(Post $post);
}
