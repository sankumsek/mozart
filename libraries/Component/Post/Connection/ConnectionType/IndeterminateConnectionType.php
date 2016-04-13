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

class IndeterminateConnectionType implements DirectionStrategyInterface
{
    public function get_arrow()
    {
        return '&harr;';
    }

    public function choose_direction($direction)
    {
        return 'from';
    }

    public function directions_for_admin($_, $show_ui)
    {
        return array_intersect(
            _p2p_expand_direction($show_ui),
            _p2p_expand_direction('any')
        );
    }

    public function get_directed_class()
    {
        return 'P2P_Indeterminate_Directed_Connection_Type';
    }
}
