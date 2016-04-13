<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Bundle\NucleusBundle\Twig;

/**
 * Twig environemntal proxy.
 */
class TwigProxy
{
    /**
     * Registration.
     *
     * @static
     */
    public static function register()
    {
    }

    /**
     * Proxy calls.
     *
     * @param string $function
     * @param array  $arguments
     *
     * @return mixed
     */
    public function __call($function, $arguments)
    {
        if (!function_exists($function)) {
            trigger_error('call to unexisting function '.$function, E_USER_ERROR);

            return;
        }

        return call_user_func_array($function, $arguments);
    }
}
