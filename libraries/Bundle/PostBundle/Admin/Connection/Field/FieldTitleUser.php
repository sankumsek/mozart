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

class FieldTitleUser extends FieldTitle
{
    public function get_data($user)
    {
        return array(
            'title-attr' => '',
        );
    }
}
