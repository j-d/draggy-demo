<?php
// HealthSystem\HealthSystemBundle\DataFixtures\ORM\DoctorFixtures.php

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

use HealthSystem\HealthSystemBundle\Entity\Doctor;
// use HealthSystem\HealthSystemBundle\Entity\Appointment;
// <user-additions part="use">
// </user-additions>

/**
 * HealthSystem\HealthSystemBundle\DataFixtures\ORM\DoctorFixtures
 */
class DoctorFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        //$doctors = [];
        //
        //foreach ($doctors as $doctor) {
        //    $doctorEntity = (new Doctor())
        //        ->setEmail($doctor['email'])
        //        ->setLastname($doctor['lastname'])
        //        ->setFirstname($doctor['firstname'])
        //        ->setAddress($doctor['address'])
        //        //->setPhone($doctor['phone'])
        //        ->setBirthdate($doctor['birthdate'])
        //        ->setAppointments($doctor['appointments']);
        //
        //    $manager->persist($doctorEntity);
        //}
        //
        //$manager->flush();

        // <user-additions part="load">
        $doctors = [
            [
                'email'     => 'house@tv.fake',
                'lastname'  => 'House',
                'firstname' => 'Gregory',
                'address'   => '123 Fake Street',
                'phone'     => '0203 111 3322',
                'birthdate' => new \DateTime( '11 June 1959' )
            ],
            [
                'email'     => 'chase@tv.fake',
                'lastname'  => 'Chase',
                'firstname' => 'Robert',
                'address'   => '24 Round Avenue',
                'phone'     => '',
                'birthdate' => new \DateTime( '24 September 1975' )
            ],
            [
                'email'     => 'cameron@tv.fake',
                'lastname'  => 'Cameron',
                'firstname' => 'Allison',
                'address'   => '8 Border Square',
                'phone'     => '',
                'birthdate' => new \DateTime( '1 November 1980' )
            ]
        ];

        foreach ($doctors as $doctor) {
            $doctorEntity = (new Doctor())
                ->setEmail($doctor['email'])
                ->setLastname($doctor['lastname'])
                ->setFirstname($doctor['firstname'])
                ->setAddress($doctor['address'])
                ->setPhone($doctor['phone'])
                ->setBirthdate($doctor['birthdate']);

            $manager->persist($doctorEntity);
        }

        $manager->flush();
        // </user-additions>
    }
}
