<?php
/**
 * Copyright 2014 Alexandru Furculita <alex@rhetina.com>
 */

namespace Mozart\Component\Option\Extension;


use Mozart\Component\Option\OptionBuilderInterface;

interface ExtensionInterface
{

    /**
     * Boot the extension
     */
    public function extend( OptionBuilderInterface $builder );
} 