<?php
// HealthSystem\HealthSystemBundle\DataFixtures\ORM\BillFixtures.php

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

use HealthSystem\HealthSystemBundle\Entity\Bill;
// use HealthSystem\HealthSystemBundle\Entity\Appointment;
// <user-additions part="use">
use HealthSystem\HealthSystemBundle\Entity\AppointmentRepository;
// </user-additions>

/**
 * HealthSystem\HealthSystemBundle\DataFixtures\ORM\BillFixtures
 */
class BillFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function getOrder()
    {
        // <user-additions part="order">
        return 40;
        // </user-additions>
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        //$bills = [];
        //
        //foreach ($bills as $bill) {
        //    $billEntity = (new Bill())
        //        ->setAppointmentId($bill['appointmentId'])
        //        ->setDate($bill['date'])
        //        ->setAmount($bill['amount'])
        //        ->setPurpose($bill['purpose']);
        //
        //    $manager->persist($billEntity);
        //}
        //
        //$manager->flush();

        // <user-additions part="load">
        $appointmentRepository = new AppointmentRepository($manager);

        $bills = [
            [
                'appointmentId' => $appointmentRepository->findOneBy(['reason' => 'Coughing']),
                'date'          => new \DateTime('7 September 2013'),
                'amount'        => 257.40,
                'purpose'       => 'Consultation with Dr. House',
            ],
        ];

        foreach ($bills as $bill) {
            $billEntity = (new Bill())
                ->setAppointmentId($bill['appointmentId'])
                ->setDate($bill['date'])
                ->setAmount($bill['amount'])
                ->setPurpose($bill['purpose']);

            $manager->persist($billEntity);
        }

        $manager->flush();
        // </user-additions>
    }
}
