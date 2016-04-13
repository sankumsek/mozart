<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Bundle\BlogBundle\Event;

use Mozart\Bundle\BlogBundle\Model\Blog;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class SwitchBlogEvent.
 */
class BlogEvent extends Event
{
    const TYPE_SWITCH_BLOG = 'wordpress.blog.switch_blog';
    /**
     * @var \Mozart\Bundle\BlogBundle\Model\Blog
     */
    protected $blog;

    /**
     * @param Blog $blog
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * @return Blog
     */
    public function getBlog()
    {
        return $this->blog;
    }
}
