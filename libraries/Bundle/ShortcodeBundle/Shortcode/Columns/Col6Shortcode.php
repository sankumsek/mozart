<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Bundle\ShortcodeBundle\Shortcode\Columns;

use Mozart\Bundle\ShortcodeBundle\ShortcodeInterface;

/**
 * Class ContentBoxShortcode.
 */
class Col6Shortcode implements ShortcodeInterface
{
    /**
     * @param      $params
     * @param null $content
     *
     * @return string
     */
    public function process($params, $content = null)
    {
        $result = '<div class="col-xs-6">'.do_shortcode($content).'</div>';

        return force_balance_tags($result);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'span6';
    }
}
