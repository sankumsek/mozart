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
namespace Mozart\Component\Widget\Sidebar\Customizer;

/**
 * Extends the widgets section to add the custom sidebars UI elements.
 *
 * Class WidgetManager
 */
class WidgetManager
{
    public function __construct()
    {
        if (is_admin()) {
            add_action(
                'widgets_admin_page',
                array($this, 'widget_sidebar_content')
            );
        }
    }

    /**
     * Adds the additional HTML code to the widgets section.
     */
    public function widget_sidebar_content()
    {
        include CSB_VIEWS_DIR.'widgets.php';
    }
}
