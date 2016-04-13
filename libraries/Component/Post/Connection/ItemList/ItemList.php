<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Component\Post\Connection\ItemList;

class ItemList
{
    /**
     * @var
     */
    public $items;
    /**
     * @var int
     */
    public $current_page = 1;
    /**
     * @var int
     */
    public $total_pages = 0;

    /**
     * @param $items
     * @param $item_type
     */
    public function __construct($items, $item_type)
    {
        if (is_numeric(reset($items))) {
            // Don't wrap when we just have a list of ids
            $this->items = $items;
        } else {
            $this->items = _p2p_wrap($items, $item_type);
        }
    }
}
