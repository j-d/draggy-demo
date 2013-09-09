<?php
// HealthSystem\HealthSystemBundle\DataFixtures\ORM\IllnessFixtures.php

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

namespace HealthSystem\HealthSystemBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
//use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use HealthSystem\HealthSystemBundle\Entity\Illness;
// use HealthSystem\HealthSystemBundle\Entity\Treatment;
// <user-additions part="use">
// </user-additions>

/**
 * HealthSystem\HealthSystemBundle\DataFixtures\ORM\IllnessFixtures
 */
class IllnessFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function getOrder()
    {
        // <user-additions part="order">
        return 10;
        // </user-additions>
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        //$illnesses = [];
        //
        //foreach ($illnesses as $illness) {
        //    $illnessEntity = (new Illness())
        //        ->setCode($illness['code'])
        //        ->setDescription($illness['description'])
        //        ->setTreatments($illness['treatments']);
        //
        //    $manager->persist($illnessEntity);
        //}
        //
        //$manager->flush();

        // <user-additions part="load">
        $illnesses = [
            [
                'code'        => 'CH',
                'description' => 'Chronic Headache'
            ],
            [
                'code'        => 'CC',
                'description' => 'Common Cold'
            ],
            [
                'code'        => 'SC',
                'description' => 'Scleriosis'
            ],
        ];

        foreach ($illnesses as $illness) {
            $illnessEntity = (new Illness())
                ->setCode($illness['code'])
                ->setDescription($illness['description']);

            $manager->persist($illnessEntity);
        }

        $manager->flush();
        // </user-additions>
    }
}
