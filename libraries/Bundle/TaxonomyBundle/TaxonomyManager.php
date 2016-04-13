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
namespace Mozart\Bundle\TaxonomyBundle;

/**
 * Class TaxonomyManager.
 */
class TaxonomyManager
{
    /**
     * @var TaxonomyInterface[]
     */
    protected $taxonomies = array();

    /**
     *
     */
    public function __construct()
    {
        $this->taxonomies = array();
    }

    /**
     * @return TaxonomyInterface[]
     */
    public function getTaxonomies()
    {
        return $this->taxonomies;
    }

    /**
     * @param TaxonomyInterface $taxonomy
     */
    public function registerTaxonomy(TaxonomyInterface $taxonomy)
    {
        $this->taxonomies[$taxonomy->getName()] = $taxonomy;
    }

    public function onWordpressInit()
    {
        foreach ($this->getTaxonomies() as $name => $taxonomy) {
            register_taxonomy($name, $taxonomy->getObjectTypes(), $taxonomy->getArguments());
        }
    }
}
