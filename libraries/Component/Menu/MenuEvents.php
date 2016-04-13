<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

/**
 * Copyright 2014 Alexandru Furculita <alex@rhetina.com>.
 */
namespace Mozart\Component\Menu;

final class MenuEvents
{
    const ORDER = 'menu_order';
    /**
     * This is the final filter that a menu is going through.
     */
    const FILTER = 'add_menu_classes';
}
