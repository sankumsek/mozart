<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Bundle\ShortcodeBundle\Shortcode;

use Mozart\Bundle\ShortcodeBundle\ShortcodeInterface;

/**
 * Class ContentBoxShortcode.
 */
class ContentBoxShortcode implements ShortcodeInterface
{
    /**
     * @param      $params
     * @param null $content
     *
     * @return string
     */
    public function process($params, $content = null)
    {
        $result = twiggy('ShortocodeBundle:Shortcodes:content_box.html.twig', array(
                    'content' => $content,
                    'icon' => !empty($params['icon']) ? $params['icon'] : false,
                    'icon_pictopro_class' => !empty($params['icon_pictopro_class']) ? $params['icon_pictopro_class'] : false,
                    'title' => !empty($params['title']) ? $params['title'] : false,
                    'columns_for_content' => !empty($params['columns_for_content']) ? $params['columns_for_content'] : 3,
                ), false);

        return force_balance_tags($result);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'content_box';
    }
}
