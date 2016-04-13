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

class SidebarManager implements SidebarManagerInterface
{
    /**
     * @var SidebarInterface[]
     */
    protected $sidebars;

    public function __construct()
    {
        $this->sidebars = array();
    }

    /**
     * @return SidebarInterface[]
     */
    public function getSidebars()
    {
        return $this->sidebars;
    }

    /**
     * @param $key
     *
     * @return SidebarInterface
     */
    public function getSidebar($key)
    {
        return $this->sidebars[$key];
    }

    /**
     * @param SidebarInterface $sidebar
     */
    public function registerSidebar(SidebarInterface $sidebar)
    {
        $this->sidebars[$sidebar->getKey()] = $sidebar;
    }
}
