<?php
// HealthSystem\HealthSystemBundle\DataFixtures\ORM\TreatmentFixtures.php

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

use HealthSystem\HealthSystemBundle\Entity\Treatment;
// use HealthSystem\HealthSystemBundle\Entity\Symptom;
// use HealthSystem\HealthSystemBundle\Entity\Illness;
// <user-additions part="use">
use HealthSystem\HealthSystemBundle\Entity\IllnessRepository;
use HealthSystem\HealthSystemBundle\Entity\SymptomRepository;
// </user-additions>

/**
 * HealthSystem\HealthSystemBundle\DataFixtures\ORM\TreatmentFixtures
 */
class TreatmentFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        //$treatments = [];
        //
        //foreach ($treatments as $treatment) {
        //    $treatmentEntity = (new Treatment())
        //        ->setSymptomName($treatment['symptomName'])
        //        ->setIllnessCode($treatment['illnessCode']);
        //        //->setMedication($treatment['medication'])
        //        //->setInstructions($treatment['instructions'])
        //        //->setSymptomSeverity($treatment['symptomSeverity'])
        //
        //    $manager->persist($treatmentEntity);
        //}
        //
        //$manager->flush();

        // <user-additions part="load">
        $symptomRepository = new SymptomRepository($manager);
        $illnessRepository = new IllnessRepository($manager);

        $treatments = [
            [
                'symptomName'     => $symptomRepository->findOneBy(['name' => 'Headache']),
                'illnessCode'     => $illnessRepository->findOneBy(['code' => 'CH']),
                'medication'      => 'Ibuprofen',
                'instructions'    => '2 tablets every 8 hours',
                'symptomSeverity' => 'Low',
            ],
            [
                'symptomName'     => $symptomRepository->findOneBy(['name' => 'Coughing']),
                'illnessCode'     => $illnessRepository->findOneBy(['code' => 'CC']),
                'medication'      => 'Zicam',
                'instructions'    => '1 tablet a day',
                'symptomSeverity' => 'Low',
            ],
            [
                'symptomName'     => $symptomRepository->findOneBy(['name' => 'Fever']),
                'illnessCode'     => $illnessRepository->findOneBy(['code' => 'CC']),
                'medication'      => 'Zicam',
                'instructions'    => '1 tablet a day',
                'symptomSeverity' => 'Low',
            ],
            [
                'symptomName'     => $symptomRepository->findOneBy(['name' => 'Back ache']),
                'illnessCode'     => $illnessRepository->findOneBy(['code' => 'SC']),
                'medication'      => 'None',
                'instructions'    => '',
                'symptomSeverity' => '',
            ],
        ];

        foreach ($treatments as $treatment) {
            $treatmentEntity = (new Treatment())
                ->setSymptomName($treatment['symptomName'])
                ->setIllnessCode($treatment['illnessCode'])
                ->setMedication($treatment['medication'])
                ->setInstructions($treatment['instructions'])
                ->setSymptomSeverity($treatment['symptomSeverity']);

            $manager->persist($treatmentEntity);
        }

        $manager->flush();
        // </user-additions>
    }
}
