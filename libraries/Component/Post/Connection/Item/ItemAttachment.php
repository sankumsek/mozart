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

class ItemAttachment extends ItemPost
{
    public function get_title()
    {
        if (wp_attachment_is_image($this->item->ID)) {
            return wp_get_attachment_image($this->item->ID, 'thumbnail', false);
        }

        return get_the_title($this->item);
    }
}
