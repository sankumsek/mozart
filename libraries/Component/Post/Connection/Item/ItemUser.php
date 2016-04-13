<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Component\Post\Connection\Item;

class ItemUser extends Item
{
    public function get_title()
    {
        return $this->item->display_name;
    }

    public function get_permalink()
    {
        return get_author_posts_url($this->item->ID);
    }

    public function get_editlink()
    {
        return get_edit_user_link($this->item->ID);
    }
}
