<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

$dirname = dirname(__FILE__).'/';
$class_file = 'functions-wpmulib.php';

if (!class_exists('TheLib') && file_exists($dirname.$class_file)) {
    require_once $dirname.$class_file;
}
