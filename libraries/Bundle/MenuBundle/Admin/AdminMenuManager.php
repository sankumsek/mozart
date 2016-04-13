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
namespace Mozart\Bundle\MenuBundle\Admin;

/**
 * Class AdminMenuManager.
 */
class AdminMenuManager
{
    /**
     * @var AdminMenuInterface[]
     */
    protected $menus;

    /**
     *
     */
    public function __construct()
    {
        $this->menus = array();
    }

    /**
     * @param AdminMenuInterface $menu
     */
    public function addMenu(AdminMenuInterface $menu)
    {
        $this->menus[$menu->getAlias()] = $menu;
    }

    /**
     * @return AdminMenuInterface[]
     */
    public function getMenus()
    {
        return $this->menus;
    }

    /**
     * @param $alias
     *
     * @return AdminMenuInterface
     */
    public function getMenu($alias)
    {
        return $this->menus[$alias];
    }
}
