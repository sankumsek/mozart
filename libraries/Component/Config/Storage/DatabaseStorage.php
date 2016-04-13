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
namespace Mozart\Component\Config\Storage;

use Mozart\Component\Config\StorageInterface;

class DatabaseStorage implements StorageInterface
{
    public function get($name)
    {
        return get_option($name);
    }

    public function getAll()
    {
        return false;
    }
}
