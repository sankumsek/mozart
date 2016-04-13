<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

$output = $title = $options = $el_class = '';
extract(shortcode_atts(array(
    'title' => __('Categories'),
    'options' => '',
    'el_class' => '',
), $atts));
$options = explode(',', $options);
if (in_array('dropdown', $options, true)) {
    $atts['dropdown'] = true;
}
if (in_array('count', $options, true)) {
    $atts['count'] = true;
}
if (in_array('hierarchical', $options, true)) {
    $atts['hierarchical'] = true;
}

$el_class = $this->getExtraClass($el_class);

$output = '<div class="vc_wp_categories wpb_content_element'.$el_class.'">';
$type = 'WP_Widget_Categories';
$args = array();

ob_start();
the_widget($type, $atts, $args);
$output .= ob_get_clean();

$output .= '</div>'.$this->endBlockComment('vc_wp_categories')."\n";

echo $output;
