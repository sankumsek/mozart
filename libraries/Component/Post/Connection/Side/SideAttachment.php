<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Component\Post\Connection\Side;

class SideAttachment extends SidePost
{
    protected $item_type = 'P2P_Item_Attachment';

    public function __construct($query_vars)
    {
        $this->query_vars = $query_vars;

        $this->query_vars['post_type'] = array('attachment');
    }

    public function can_create_item()
    {
        return false;
    }

    public function get_base_qv($q)
    {
        return array_merge(parent::get_base_qv($q), array(
            'post_status' => 'inherit',
        ));
    }
}
