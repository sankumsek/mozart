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
namespace Mozart\Component\Post\Type;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Interface PostTypeInterface.
 */
interface PostTypeInterface
{
    public function getName();

    /**
     * @return mixed
     */
    public function getKey();

    /**
     * @return mixed
     */
    public function getConfiguration();

    /**
     * Sets the default options for this type.
     *
     * @param OptionsResolverInterface $resolver The resolver for the options.
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver);
}
