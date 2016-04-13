<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mozart\Component\Support\Contracts;

interface ResponsePreparerInterface
{
    /**
     * Prepare the given value as a Response object.
     *
     * @param mixed $value
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function prepareResponse($value);

    /**
     * Determine if provider is ready to return responses.
     *
     * @return bool
     */
    public function readyForResponses();
}
