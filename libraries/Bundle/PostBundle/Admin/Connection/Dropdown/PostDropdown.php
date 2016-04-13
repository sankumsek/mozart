<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Bundle\PostBundle\Admin\Connection\Dropdown;

class PostDropdown extends Dropdown
{
    public function __construct($directed, $title)
    {
        parent::__construct($directed, $title);

        add_filter('request', array(__CLASS__, 'massage_query'));

        add_action('restrict_manage_posts', array($this, 'show_dropdown'));
    }

    public static function massage_query($request)
    {
        return array_merge($request, self::get_qv());
    }
}
