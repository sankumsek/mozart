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
namespace Mozart\Bundle\ThemeBundle\Exception;

use Mozart\Bundle\NucleusBundle\Exception\ExceptionInterface;

class BadMethodCallException extends \BadMethodCallException implements ExceptionInterface
{
}
