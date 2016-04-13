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
namespace Mozart\Bundle\WidgetBundle;

interface SidebarManagerInterface
{
    public function getSidebars();

    public function getSidebar($key);

    public function registerSidebar(SidebarInterface $sidebar);
}
