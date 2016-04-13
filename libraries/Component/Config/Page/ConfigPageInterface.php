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

interface ConfigPageInterface
{
    public function getKey();

    public function getName();

    public function getParent();

    public function getUserCapabilities();

    public function getMenuPosition();

    public function getIconUrl();

    public function toRedirect();

    public function getShortName();

    public function getType();
}
