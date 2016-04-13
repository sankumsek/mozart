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

use Mozart\Component\Post\Connection\DirectionStrategyInterface;

class DeterminateConnectionType implements DirectionStrategyInterface
{
    public function get_arrow()
    {
        return '&rarr;';
    }

    public function choose_direction($direction)
    {
        return $direction;
    }

    public function directions_for_admin($direction, $show_ui)
    {
        return array_intersect(
            _p2p_expand_direction($show_ui),
            _p2p_expand_direction($direction)
        );
    }

    public function get_directed_class()
    {
        return 'P2P_Directed_Connection_Type';
    }
}
