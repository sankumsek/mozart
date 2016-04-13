<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Bundle\PostBundle\Admin\Connection\Field;

abstract class FieldTitle implements FieldInterface
{
    protected $title;

    public function __construct($title = '')
    {
        $this->title = $title;
    }

    public function get_title()
    {
        return $this->title;
    }

    public function render($p2p_id, $item)
    {
        $data = array_merge(
            $this->get_data($item),
            array(
                'title' => $item->title,
                'url' => $item->get_editlink(),
            )
        );

        return P2P_Mustache::render('column-title', $data);
    }

    abstract public function get_data($item);
}
