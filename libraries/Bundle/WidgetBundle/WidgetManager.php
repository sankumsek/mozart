<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Bundle\WidgetBundle;

/**
 * Class WidgetChain.
 */
class WidgetManager implements WidgetManagerInterface
{
    /**
     * @var WidgetInterface[]
     */
    protected $widgets = array();

    /**
     *
     */
    public function __construct()
    {
        $this->widgets = array();
    }

    /**
     * @return \Mozart\Bundle\WidgetBundle\WidgetInterface[]
     */
    public function getWidgets()
    {
        return $this->widgets;
    }

    /**
     * @param string $widget
     */
    public function registerWidget(WidgetInterface $widget)
    {
        $this->widgets[get_class($widget)] = $widget;
    }
}
