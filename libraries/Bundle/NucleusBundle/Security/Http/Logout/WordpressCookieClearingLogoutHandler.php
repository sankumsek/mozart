<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace  Mozart\Bundle\NucleusBundle\Security\Http\Logout;

use Mozart\Bundle\NucleusBundle\Wordpress\ConfigurationManager;
use Symfony\Component\Security\Http\Logout\CookieClearingLogoutHandler;

class WordpressCookieClearingLogoutHandler extends CookieClearingLogoutHandler
{
    public function __construct(ConfigurationManager $configuration)
    {
        parent::__construct(array(
            $configuration->getLoggedInCookieName() => array(
                'path' => $configuration->getCookiePath(),
                'domain' => $configuration->getCookieDomain(),
            ),
        ));
    }
}
