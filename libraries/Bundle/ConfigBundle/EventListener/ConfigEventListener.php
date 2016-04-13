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
namespace Mozart\Bundle\ConfigBundle\EventListener;

use Mozart\Component\Config\Page\AbstractConfigPageManager;
use Mozart\Component\Config\Page\AbstractFieldGroupManager;

class ConfigEventListener
{
    /**
     * @var \Mozart\Component\Config\Page\AbstractConfigPageManager
     */
    private $configPageManager;
    /**
     * @var \Mozart\Component\Config\Page\AbstractFieldGroupManager
     */
    private $fieldGroupManager;

    public function __construct(
        AbstractConfigPageManager $configPageManager,
        AbstractFieldGroupManager $fieldGroupManager
    ) {
        $this->configPageManager = $configPageManager;
        $this->fieldGroupManager = $fieldGroupManager;
    }

    public function onApplicationInit()
    {
        $this->configPageManager->registerPages();
        $this->fieldGroupManager->registerFieldGroups();
    }
}
