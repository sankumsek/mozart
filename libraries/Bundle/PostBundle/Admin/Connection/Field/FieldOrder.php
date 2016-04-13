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

class FieldOrder implements FieldInterface
{
    protected $sort_key;

    public function __construct($sort_key)
    {
        $this->sort_key = $sort_key;
    }

    public function get_title()
    {
        return '';
    }

    public function render($p2p_id, $_)
    {
        return html('input', array(
            'type' => 'hidden',
            'name' => "p2p_order[$this->sort_key][]",
            'value' => $p2p_id,
        ));
    }
}
