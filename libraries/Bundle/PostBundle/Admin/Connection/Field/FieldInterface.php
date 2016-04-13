<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Bundle\PostBundle\Admin\Connection\Field;

/**
 * A P2P admin metabox is composed of several "fields".
 */
interface FieldInterface
{
    public function get_title();
    public function render($p2p_id, $item);
}
