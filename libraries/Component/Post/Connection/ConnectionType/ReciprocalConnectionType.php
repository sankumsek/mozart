<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Component\Post\Connection\ConnectionType;

class ReciprocalConnectionType extends IndeterminateConnectionType
{
    public function choose_direction($direction)
    {
        return 'any';
    }

    public function directions_for_admin($direction, $show_ui)
    {
        if ($show_ui) {
            $directions = array('any');
        } else {
            $directions = array();
        }

        return $directions;
    }
}
