<?php

/*
 * This file is part of the Mozart library.
 *
 * (c) Alexandru Furculita <alex@rhetina.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace  Mozart\Bundle\ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Mozart\Bundle\ConfigBundle\Model\Option as ModelOption;
use Mozart\Bundle\NucleusBundle\Annotation as Mozart;
use Symfony\Component\Validator\Constraints as Constraints;

/**
 *  Mozart\Bundle\ConfigBundle\Entity\Option.
 *
 * @ORM\Table(name="options")
 * @ORM\Entity
 * @Mozart\WPTable
 */
class Option extends ModelOption
{
    /**
     * @var int
     *
     * @ORM\Column(name="option_id", type="bigint", length=20)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="option_name", type="string", length=64, nullable=false, unique=true)
     * @Constraints\NotBlank()
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="option_value", type="wordpressmeta", nullable=false)
     */
    protected $value;

    /**
     * @var string
     *
     * @ORM\Column(name="autoload", type="string", length=20, nullable=false)
     * @Constraints\NotBlank()
     */
    protected $autoload = 'yes';
}
