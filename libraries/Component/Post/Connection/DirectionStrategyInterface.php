<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Component\Post\Connection;

interface DirectionStrategyInterface
{
    public function get_arrow();
    public function choose_direction($direction);
    public function directions_for_admin($direction, $show_ui);
    public function get_directed_class();
}
