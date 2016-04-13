<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Component\Post\Connection\Util;

class UrlQuery
{
    public static function get_custom_qv()
    {
        return array('connected_type', 'connected_items', 'connected_direction');
    }

    public static function init()
    {
        add_filter('query_vars', array(__CLASS__, 'query_vars'));
    }

    // Make the query vars public
    public static function query_vars($public_qv)
    {
        return array_merge($public_qv, self::get_custom_qv());
    }
}
