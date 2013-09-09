<?php
// HealthSystem\HealthSystemBundle\DataFixtures\ORM\NurseFixtures.php

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

use HealthSystem\HealthSystemBundle\Entity\Nurse;
// <user-additions part="use">
// </user-additions>

/**
 * HealthSystem\HealthSystemBundle\DataFixtures\ORM\NurseFixtures
 */
class NurseFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        //$nurses = [];
        //
        //foreach ($nurses as $nurse) {
        //    $nurseEntity = (new Nurse())
        //        ->setLastname($nurse['lastname'])
        //        ->setFirstname($nurse['firstname'])
        //        ->setAddress($nurse['address'])
        //        //->setPhone($nurse['phone'])
        //        ->setBirthdate($nurse['birthdate']);
        //
        //    $manager->persist($nurseEntity);
        //}
        //
        //$manager->flush();

        // <user-additions part="load">
        $nurses = [
            [
                'lastname'  => 'Williams',
                'firstname' => 'Michelle',
                'address'   => '1 Great Dover street',
                'phone'     => '',
                'birthdate' => new \DateTime( '14 December 1957' )
            ],
            [
                'lastname'  => 'Marquez',
                'firstname' => 'Evelyn',
                'address'   => '76b Down street',
                'phone'     => '020 7556 5555',
                'birthdate' => new \DateTime( '9 August 1994' )
            ],
        ];

        foreach ($nurses as $nurse) {
            $nurseEntity = (new Nurse())
                ->setLastname($nurse['lastname'])
                ->setFirstname($nurse['firstname'])
                ->setAddress($nurse['address'])
                ->setPhone($nurse['phone'])
                ->setBirthdate($nurse['birthdate']);

            $manager->persist($nurseEntity);
        }

        $manager->flush();
        // </user-additions>
    }
}
