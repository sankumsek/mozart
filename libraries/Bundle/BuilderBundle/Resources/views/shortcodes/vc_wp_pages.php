<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

$output = $title = $el_class = $sortby = $exclude = '';
extract(shortcode_atts(array(
    'title' => __('Pages'),
    'sortby' => 'menu_order',
    'exclude' => null,
    'el_class' => '',
), $atts));

$el_class = $this->getExtraClass($el_class);

$output = '<div class="vc_wp_pages wpb_content_element'.$el_class.'">';
$type = 'WP_Widget_Pages';
$args = array();

ob_start();
the_widget($type, $atts, $args);
$output .= ob_get_clean();

$output .= '</div>'.$this->endBlockComment('vc_wp_pages')."\n";

echo $output;
