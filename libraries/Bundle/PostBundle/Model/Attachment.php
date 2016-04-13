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
 * Class Attachment.
 */
class Attachment extends Post implements AttachmentInterface
{
    /**
     * @var
     */
    protected $post;
    /**
     * @var mixed
     */
    protected $metadata;
    /**
     * @var
     */
    protected $url;
    /**
     * @var
     */
    protected $thumbnailUrl;

    /**
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->metadata = $post->getMetas()
            ->filter(
                function (PostMeta $meta) {
                    return '_wp_attachment_metadata' === $meta->getKey();
                }
            )
            ->first();
    }

    /**
     * @return mixed
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param string $size
     *
     * @return null|string
     */
    public function getThumbnailUrl($size = 'post-thumbnail')
    {
        $rawMetadata = $this->metadata->getValue();

        if (isset($rawMetadata['sizes'][$size])) {
            return dirname($rawMetadata['file']).'/'.$rawMetadata['sizes'][$size]['file'];
        }

        return;
    }

    /**
     * @param $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }
}
