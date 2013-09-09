<?php
// HealthSystem\HealthSystemBundle\Entity\MedicalHistoryRepository.php

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

namespace HealthSystem\HealthSystemBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;
// <user-additions part="use">
// </user-additions>

/**
 * HealthSystem\HealthSystemBundle\Entity\MedicalHistoryRepository
 */
class MedicalHistoryRepository extends EntityRepository
{
    /**
     * @param EntityManager|ObjectManager $em The EntityManager to use.
     */
    function __construct($em)
    {
        /** @var ClassMetadata $metadata */
        $metadata = $em->getClassMetadata('HealthSystemBundle:MedicalHistory');

        parent::__construct($em, $metadata);
    }

    // <user-additions part="methods">
    // </user-additions>
}
