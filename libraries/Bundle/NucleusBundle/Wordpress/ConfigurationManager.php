<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Bundle\NucleusBundle\Wordpress;

/**
 * Class ConfigurationManager.
 */
class ConfigurationManager
{
    /**
     * @var
     */
    protected $siteUrl;
    /**
     * @var string
     */
    protected $cookiePath;
    /**
     * @var null
     */
    protected $cookieDomain;
    /**
     * @var
     */
    protected $loggedInKey;
    /**
     * @var
     */
    protected $loggedInSalt;

    /**
     * @param        $siteUrl
     * @param string $cookiePath
     * @param null   $cookieDomain
     * @param        $loggedInKey
     * @param        $loggedInSalt
     */
    public function __construct($siteUrl, $cookiePath = '/', $cookieDomain = null, $loggedInKey, $loggedInSalt)
    {
        $this->siteUrl = $siteUrl;
        $this->cookiePath = $cookiePath;
        $this->cookieDomain = $cookieDomain;
        $this->loggedInKey = $loggedInKey;
        $this->loggedInSalt = $loggedInSalt;
    }

    /**
     */
    public function getCookieDomain()
    {
        return $this->cookieDomain;
    }

    /**
     * @return string
     */
    public function getCookiePath()
    {
        return $this->cookiePath;
    }

    /**
     * @return mixed
     */
    public function getLoggedInKey()
    {
        return $this->loggedInKey;
    }

    /**
     * @return mixed
     */
    public function getLoggedInSalt()
    {
        return $this->loggedInSalt;
    }

    /**
     * @return mixed
     */
    public function getSiteUrl()
    {
        return $this->siteUrl;
    }

    /**
     * @return string
     */
    public function getLoggedInCookieName()
    {
        return 'wordpress_logged_in_'.md5($this->getSiteUrl());
    }
}
