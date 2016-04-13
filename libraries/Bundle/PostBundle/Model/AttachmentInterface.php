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
 * Interface AttachmentInterface.
 */
interface AttachmentInterface
{
    /**
     * Retrieve permalink for attachment.
     *
     * @return string
     */
    public function getUrl();

    /**
     * @return array|bool Attachment meta field. False on failure.
     */
    public function getMetadata();

    /**
     * Retrieve URL for an attachment thumbnail.
     *
     * @param array $size
     *
     * @return string
     */
    public function getThumbnailUrl($size = null);

    /**
     * @return string
     */
    public function getMimeType();
}
