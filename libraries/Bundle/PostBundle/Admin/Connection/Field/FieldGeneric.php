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

class FieldGeneric implements FieldInterface
{
    protected $key;
    protected $data;

    public function __construct($key, $data)
    {
        $this->key = $key;
        $this->data = $data;
    }

    public function get_title()
    {
        return $this->data['title'];
    }

    public function render($p2p_id, $_)
    {
        $args = $this->data;
        $args['name'] = array('p2p_meta', $p2p_id, $this->key);

        if ('select' === $args['type'] && !isset($args['text'])) {
            $args['text'] = '';
        }

        return scbForms::input_from_meta($args, $p2p_id, 'p2p');
    }
}
