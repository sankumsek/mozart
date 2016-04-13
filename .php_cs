<?php

$header = <<<'EOF'
This file is part of the Mozart library.

(c) Alexandru Furculita <alex@rhetina.com>

This source file is subject to the MIT license that is bundled
with this source code in the file LICENSE.
EOF;

\Symfony\CS\Fixer\Contrib\HeaderCommentFixer::setHeader($header);

return \Symfony\CS\Config\Config::create()
    // use default SYMFONY_LEVEL and extra fixers:
    ->fixers(array(
        'header_comment',
        'ordered_use',
        'strict',
        'strict_param',
    ))
    ->setUsingCache(true)
    ->finder(
        Symfony\CS\Finder\DefaultFinder::create()
            ->in('libraries')
    )
;
