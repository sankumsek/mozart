<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

$type = $annotation = '';
extract(shortcode_atts(array(
    'type' => '',
    'annotation' => '',
), $atts));

$params = '';
$params .= ($type !== '') ? ' size="'.$type.'" ' : '';
$params .= ($annotation !== '') ? ' annotation="'.$annotation.'"' : '';

if ($type === '') {
    $type = 'standard';
}
$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_googleplus wpb_content_element wpb_googleplus_type_'.$type, $this->settings['base'], $atts);
$output = '<div class="'.$css_class.'"><g:plusone'.$params.'></g:plusone></div>'.$this->endBlockComment('wpb_googleplus')."\n";

echo $output;
