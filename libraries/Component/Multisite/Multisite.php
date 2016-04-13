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
namespace Mozart\Component\Multisite;

class Multisite
{
    /**
     * Whether Multisite support is enabled.
     *
     * @since 3.0.0
     *
     * @return bool True if multisite is enabled, false otherwise.
     */
    public function isEnabled()
    {
        if (defined('MULTISITE')) {
            return MULTISITE;
        }

        if (defined('SUBDOMAIN_INSTALL') || defined('VHOST') || defined('SUNRISE')) {
            return true;
        }

        return false;
    }
}
