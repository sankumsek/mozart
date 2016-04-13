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
namespace Mozart\Component\Config;

class ConfigFactory implements ConfigFactoryInterface
{
    /**
     * @var StorageInterface
     */
    protected $storage;

    /**
     * @param StorageInterface $storage
     */
    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function get($name)
    {
        return $this->storage->get($name);
    }

    public function getAll()
    {
        return $this->storage->getAll();
    }

    /**
     * @return StorageInterface
     */
    public function getActiveStorage()
    {
        return $this->storage;
    }
}
