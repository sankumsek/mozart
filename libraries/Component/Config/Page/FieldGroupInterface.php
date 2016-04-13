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

interface FieldGroupInterface
{
    public function getKey();

    public function getName();

    public function getFields();

    /**
     * @return ConfigPageInterface
     */
    public function getConfigPage();

    public function getLocation();
}
