<?php
// HealthSystem\HealthSystemBundle\DataFixtures\ORM\PatientFixtures.php

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

use HealthSystem\HealthSystemBundle\Entity\Patient;
// use HealthSystem\HealthSystemBundle\Entity\Symptom;
// use HealthSystem\HealthSystemBundle\Entity\MedicalHistory;
// use HealthSystem\HealthSystemBundle\Entity\Appointment;
// <user-additions part="use">
use Doctrine\Common\Collections\ArrayCollection;
use HealthSystem\HealthSystemBundle\Entity\SymptomRepository;
// </user-additions>

/**
 * HealthSystem\HealthSystemBundle\DataFixtures\ORM\PatientFixtures
 */
class PatientFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function getOrder()
    {
        // <user-additions part="order">
        return 20;
        // </user-additions>
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        //$patients = [];
        //
        //foreach ($patients as $patient) {
        //    $patientEntity = (new Patient())
        //        ->setLastname($patient['lastname'])
        //        ->setFirstname($patient['firstname'])
        //        ->setAddress($patient['address'])
        //        //->setPhone($patient['phone'])
        //        ->setBirthdate($patient['birthdate'])
        //        ->setSymptoms($patient['symptoms'])
        //        ->setMedicalHistory($patient['medicalHistory'])
        //        ->setAppointments($patient['appointments']);
        //
        //    $manager->persist($patientEntity);
        //}
        //
        //$manager->flush();

        // <user-additions part="load">
        $symtomsRepository = new SymptomRepository($manager);

        $patients = [
            [
                'lastname'  => 'Sheppard',
                'firstname' => 'Leroy',
                'address'   => '67 Middle row',
                'phone'     => '020 666 7777',
                'birthdate' => new \DateTime( '2nd January 1967' ),
                'symptoms'  => new ArrayCollection( [$symtomsRepository->findOneBy(['name' => 'Fever'])] )
            ],
            [
                'lastname'  => 'McGowan',
                'firstname' => 'Wang',
                'address'   => '202 Petunia Avenue',
                'phone'     => '077 555 7877',
                'birthdate' => new \DateTime( '9 October 1937' ),
                'symptoms'  => new ArrayCollection(
                    [
                        $symtomsRepository->findOneBy(['name' => 'Coughing']),
                        $symtomsRepository->findOneBy(['name' => 'Headache'])
                    ]
                )
            ],
            [
                'lastname'  => 'Tyler',
                'firstname' => 'Chloe',
                'address'   => '90 Parkinson Terrace',
                'phone'     => '',
                'birthdate' => new \DateTime( '19 June 1983' ),
                'symptoms'  => new ArrayCollection( [$symtomsRepository->findOneBy(['name' => 'Back ache'])] )
            ],
        ];

        foreach ($patients as $patient) {
            $patientEntity = (new Patient())
                ->setLastname($patient['lastname'])
                ->setFirstname($patient['firstname'])
                ->setAddress($patient['address'])
                ->setPhone($patient['phone'])
                ->setBirthdate($patient['birthdate'])
                ->setSymptoms($patient['symptoms']);

            $manager->persist($patientEntity);
        }

        $manager->flush();
        // </user-additions>
    }
}
