<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

/**
 * Copyright 2014 Alexandru Furculita <alex@rhetina.com>.
 */
namespace Mozart\Component\Post\Type;

use Mozart\Component\Post\Type\Extension\PostTypeExtensionInterface;

/**
 * Class PostTypeManager.
 */
class PostTypeManager
{
    /**
     * @var PostTypeInterface[]
     */
    private $post_types;
    /**
     * @var PostTypeExtensionInterface[]
     */
    private $extensions;

    /**
     *
     */
    public function __construct()
    {
        $this->post_types = array();
    }

    /**
     * @param PostTypeInterface $post_type
     */
    public function registerPostType(PostTypeInterface $post_type)
    {
        $this->post_types[$post_type->getKey()] = $post_type;
    }

    /**
     * @param PostTypeInterface $extension
     */
    public function registerExtension(PostTypeExtensionInterface $extension)
    {
        if (false === isset($this->post_types[$extension->getKey()])) {
            return;
        }
        $this->extensions[$extension->getKey()][] = $extension;
    }

    /**
     * @return PostTypeInterface[]
     */
    public function getPostTypes()
    {
        return $this->post_types;
    }

    /**
     * @param $key
     *
     * @return bool|PostTypeExtensionInterface[]
     */
    public function getExtensions($key)
    {
        if (true === isset($this->extensions[$key])) {
            return $this->extensions[$key];
        }

        return false;
    }
}
