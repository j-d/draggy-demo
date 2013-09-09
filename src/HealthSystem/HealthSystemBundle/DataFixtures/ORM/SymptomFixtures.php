<?php
// HealthSystem\HealthSystemBundle\DataFixtures\ORM\SymptomFixtures.php

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

use HealthSystem\HealthSystemBundle\Entity\Symptom;
// use HealthSystem\HealthSystemBundle\Entity\Patient;
// use HealthSystem\HealthSystemBundle\Entity\Treatment;
// <user-additions part="use">
// </user-additions>

/**
 * HealthSystem\HealthSystemBundle\DataFixtures\ORM\SymptomFixtures
 */
class SymptomFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        //$symptoms = [];
        //
        //foreach ($symptoms as $symptom) {
        //    $symptomEntity = (new Symptom())
        //        ->setName($symptom['name'])
        //        ->setPatients($symptom['patients'])
        //        ->setTreatments($symptom['treatments']);
        //
        //    $manager->persist($symptomEntity);
        //}
        //
        //$manager->flush();

        // <user-additions part="load">
        $symptoms = [
            [
                'name' => 'Fever',
            ],
            [
                'name' => 'Coughing',
            ],
            [
                'name' => 'Headache',
            ],
            [
                'name' => 'Back ache',
            ],
        ];

        foreach ($symptoms as $symptom) {
            $symptomEntity = (new Symptom())
                ->setName($symptom['name']);

            $manager->persist($symptomEntity);
        }

        $manager->flush();
        // </user-additions>
    }
}
