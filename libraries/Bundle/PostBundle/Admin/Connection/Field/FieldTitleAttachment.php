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

class FieldTitleAttachment extends FieldTitle
{
    public function get_data($item)
    {
        $data = array(
            'title-attr' => $item->get_object()->post_title,
        );

        return $data;
    }
}
