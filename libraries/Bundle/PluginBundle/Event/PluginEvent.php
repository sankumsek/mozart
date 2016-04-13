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
namespace Mozart\Bundle\PluginBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class PluginEvent extends Event
{
    private $baseName = '';
    private $networkDeactivating = false;

    /**
     * @return string
     */
    public function getBaseName()
    {
        return $this->baseName;
    }

    /**
     * @param string $baseName
     */
    public function setBaseName($baseName)
    {
        $this->baseName = $baseName;
    }

    /**
     * @return bool
     */
    public function isNetworkDeactivating()
    {
        return $this->networkDeactivating;
    }

    /**
     * @param bool $networkDeactivating
     */
    public function setNetworkDeactivating($networkDeactivating)
    {
        $this->networkDeactivating = $networkDeactivating;
    }
}
