<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace  Mozart\Bundle\NucleusBundle\Security\Authentication\Token;

use Symfony\Component\Security\Core\Authentication\Token\AbstractToken;
use Symfony\Component\Security\Core\User\UserInterface;

class WordpressToken extends AbstractToken
{
    /**
     * Constructor.
     */
    public function __construct(UserInterface $user, array $roles = array())
    {
        parent::__construct($user->getRoles());
        $this->setUser($user);
    }

    public function getCredentials()
    {
        return '';
    }
}
