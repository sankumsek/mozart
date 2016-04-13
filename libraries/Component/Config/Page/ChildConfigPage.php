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

class ChildConfigPage extends ConfigPage
{
    /**
     * @var ConfigPageInterface
     */
    protected $parentConfigPage;

    public function __construct(ConfigPageInterface $parentConfigPage)
    {
        $this->parentConfigPage = $parentConfigPage;
    }

    public function getParent()
    {
        return $this->parentConfigPage->getKey();
    }

    public function setParent(ConfigPageInterface $parentConfigPage)
    {
        $this->parentConfigPage = $parentConfigPage;
    }
}
