<?php
// HealthSystem\HealthSystemBundle\DataFixtures\ORM\AppointmentFixtures.php

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

use HealthSystem\HealthSystemBundle\Entity\DoctorRepository;
use HealthSystem\HealthSystemBundle\Entity\PatientRepository;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use HealthSystem\HealthSystemBundle\Entity\Appointment;
// use HealthSystem\HealthSystemBundle\Entity\Patient;
// use HealthSystem\HealthSystemBundle\Entity\Doctor;
// use HealthSystem\HealthSystemBundle\Entity\Bill;
// <user-additions part="use">
// </user-additions>

/**
 * HealthSystem\HealthSystemBundle\DataFixtures\ORM\AppointmentFixtures
 */
class AppointmentFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function getOrder()
    {
        // <user-additions part="order">
        return 30;
        // </user-additions>
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        //$appointments = [];
        //
        //foreach ($appointments as $appointment) {
        //    $appointmentEntity = (new Appointment())
        //        ->setPatientId($appointment['patientId'])
        //        ->setDoctorId($appointment['doctorId'])
        //        ->setTime($appointment['time'])
        //        ->setDate($appointment['date'])
        //        ->setReason($appointment['reason'])
        //        ->setBill($appointment['bill']);
        //
        //    $manager->persist($appointmentEntity);
        //}
        //
        //$manager->flush();

        // <user-additions part="load">
        $patientRepository = new PatientRepository($manager);
        $doctorRepository  = new DoctorRepository($manager);

        $appointments = [
            [
                'patientId' => $patientRepository->findOneBy(['firstname' => 'Wang']),
                'doctorId'  => $doctorRepository->findOneBy(['lastname' => 'House']),
                'time'      => new \DateTime('10 am'),
                'date'      => new \DateTime('06 September 2013'),
                'reason'    => 'Coughing'
            ],
            [
                'patientId' => $patientRepository->findOneBy(['firstname' => 'Leroy']),
                'doctorId'  => $doctorRepository->findOneBy(['lastname' => 'House']),
                'time'      => new \DateTime('10:30 am'),
                'date'      => new \DateTime('09 September 2013'),
                'reason'    => 'Fever'
            ],
        ];

        foreach ($appointments as $appointment) {
            $appointmentEntity = (new Appointment())
                ->setPatientId($appointment['patientId'])
                ->setDoctorId($appointment['doctorId'])
                ->setTime($appointment['time'])
                ->setDate($appointment['date'])
                ->setReason($appointment['reason']);

            $manager->persist($appointmentEntity);
        }

        $manager->flush();
        // </user-additions>
    }
}
