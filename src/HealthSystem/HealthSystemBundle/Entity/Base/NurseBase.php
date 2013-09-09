<?php
// HealthSystem\HealthSystemBundle\Entity\Base\NurseBase.php

/************************************************************************************************
 **  THIS IS AN AUTOMATICALLY GENERATED BASE FILE AND SHOULD NOT BE MANUALLY EDITED            **
 **  All user content should be placed within <user-additions part="(name)"></user-additions>  **
 ************************************************************************************************/

/*
 * This file was automatically generated with 'Autocode'
 * by Jose Diaz-Angulo <jose@diazangulo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with the package's source code.
 */

namespace HealthSystem\HealthSystemBundle\Entity\Base;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use HealthSystem\HealthSystemBundle\Entity\Nurse;
use HealthSystem\HealthSystemBundle\Entity\Employee;

/**
 * HealthSystem\HealthSystemBundle\Entity\Base\Nurse
 *
 * @ORM\MappedSuperclass
 */
abstract class NurseBase extends Employee
{
    // <editor-fold desc="Attributes">
    // </editor-fold>

    // <editor-fold desc="Constructor">
    public function __construct()
    {
    }
    // </editor-fold>

    // <editor-fold desc="Setters and getters">
    // </editor-fold>

    // <editor-fold desc="Other methods">
    /**
     * Nurse to string (lastname)
     *
     * @return string
     */
    public function __toString()
    {
        return strval($this->lastname);
    }
    // </editor-fold>
}
