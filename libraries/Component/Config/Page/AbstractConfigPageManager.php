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
namespace Mozart\Component\Config\Page;

/**
 * Class ConfigPageManager.
 */
abstract class AbstractConfigPageManager
{
    /**
     * @var array
     */
    protected $pages;

    /**
     *
     */
    public function __construct()
    {
        $this->pages = array();
    }

    /**
     * @param ConfigPageInterface $configPage
     */
    public function registerPage(ConfigPageInterface $configPage)
    {
        if ($configPage->getMenuPosition()) {
            $this->pages[$configPage->getMenuPosition()][$configPage->getKey()] = $configPage;
        } else {
            $this->pages[] = array(
                $configPage->getKey() => $configPage,
            );
        }
    }

    abstract public function registerPages();

    /**
     * @return array
     */
    public function getPages()
    {
        return $this->pages;
    }
}
