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

class ItemAny extends Item
{
    public function __construct()
    {
    }

    public function get_permalink()
    {
    }

    public function get_title()
    {
    }

    public function get_object()
    {
        return 'any';
    }

    public function get_id()
    {
        return false;
    }
}
