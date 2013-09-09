<?php
// HealthSystem\HealthSystemBundle\DataFixtures\ORM\MedicalHistoryFixtures.php

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

use HealthSystem\HealthSystemBundle\Entity\PatientRepository;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use HealthSystem\HealthSystemBundle\Entity\MedicalHistory;
// use HealthSystem\HealthSystemBundle\Entity\Patient;
// <user-additions part="use">
// </user-additions>

/**
 * HealthSystem\HealthSystemBundle\DataFixtures\ORM\MedicalHistoryFixtures
 */
class MedicalHistoryFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        //$medicalHistories = [];
        //
        //foreach ($medicalHistories as $medicalHistory) {
        //    $medicalHistoryEntity = (new MedicalHistory())
        //        ->setPatientId($medicalHistory['patientId']);
        //        //->setHeartDisease($medicalHistory['heartDisease'])
        //        //->setHighBloodPressure($medicalHistory['highBloodPressure'])
        //        //->setDiabetes($medicalHistory['diabetes'])
        //        //->setAllergies($medicalHistory['allergies'])
        //
        //    $manager->persist($medicalHistoryEntity);
        //}
        //
        //$manager->flush();

        // <user-additions part="load">
        $patientRepository = new PatientRepository($manager);

        $medicalHistories = [
            [
                'patientId'         => $patientRepository->findOneBy(['firstname' => 'Leroy']),
                'heartDisease'      => '',
                'highBloodPressure' => '',
                'diabetes'          => 'Leroy suffers from Type 2 diabetes',
                'allergies'         => '',
            ],
            [
                'patientId'         => $patientRepository->findOneBy(['firstname' => 'Wang']),
                'heartDisease'      => 'Had a valve installed age six',
                'highBloodPressure' => 'Not tested yet',
                'diabetes'          => '',
                'allergies'         => 'Allergic to penicillin',
            ],
        ];

        foreach ($medicalHistories as $medicalHistory) {
            $medicalHistoryEntity = (new MedicalHistory())
                ->setPatientId($medicalHistory['patientId'])
                ->setHeartDisease($medicalHistory['heartDisease'])
                ->setHighBloodPressure($medicalHistory['highBloodPressure'])
                ->setDiabetes($medicalHistory['diabetes'])
                ->setAllergies($medicalHistory['allergies']);

            $manager->persist($medicalHistoryEntity);
        }

        $manager->flush();
        // </user-additions>
    }
}
