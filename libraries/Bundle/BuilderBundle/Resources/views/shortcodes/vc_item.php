<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

$output = $el_class = $width = '';
extract(shortcode_atts(array(
    'el_class' => '',
), $atts));

$el_class = $this->getExtraClass($el_class);

echo '<div class="vc_items'.$el_class.'">'.__('Item', 'js_composer').'</div>';
