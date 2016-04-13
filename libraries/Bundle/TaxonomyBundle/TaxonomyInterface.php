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

interface TaxonomyInterface
{
    public function getName();
    public function getDescription();
    public function getObjectTypes();
    public function getLabels();
    public function isPublic();
    public function getMetaboxCallback();
    public function isHierarchical();
    public function getUpdateCountCallback();
    public function getQueryVariable();
    public function toSort();
    public function getCapabilities();
    public function getRewriteOptions();
}
