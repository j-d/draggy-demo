<?php
// HealthSystem\HealthSystemBundle\Controller\BillController.php

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

namespace HealthSystem\HealthSystemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HealthSystem\HealthSystemBundle\Form\Type\BillType;
use HealthSystem\HealthSystemBundle\Entity\Bill;
use HealthSystem\HealthSystemBundle\Entity\BillRepository;
use Doctrine\ORM\EntityManager;

// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpFoundation\RedirectResponse;
// use Symfony\Component\Security\Core\SecurityContext;

// use Doctrine\Common\Collections\ArrayCollection;

// use HealthSystem\HealthSystemBundle\Entity\Bill;
// use HealthSystem\HealthSystemBundle\Entity\Appointment;
// use HealthSystem\HealthSystemBundle\Entity\AppointmentRepository;

// <user-additions part="use">
// </user-additions>

/**
 * HealthSystem\HealthSystemBundle\Controller\BillController
 */
class BillController extends Controller
{
    //public function xxxAction(Request $request)
    //{
    //    /** @var EntityManager $em */
    //    $em  = $this->getDoctrine()->getManager();
    //    $xxx = $em->getRepository('HealthSystemBundle:Bill')->findXYZ();
    //
    //    $billRepository = new BillRepository($em);
    //
    //    $xxx = $em->getRepository('HealthSystemBundle:Appointment')->findXYZ();
    //
    //    $appointmentRepository = new AppointmentRepository($em);
    //
    //    $user = $this->get('security.context')->getToken()->getUser();
    //    if ($this->get('security.context')->isGranted('ROLE_XXX'))
    //
    //    $bill     = new Bill();
    //    $billType = new BillType();
    //
    //    $form = $this->createForm($billType, $bill);
    //
    //    if ($request->isMethod('POST')) {
    //        $form->submit($request->request->get($form->getName()));
    //
    //        if ($form->isValid()) {
    //            /** @var EntityManager $em */
    //            $em = $this->getDoctrine()->getManager();
    //            $em->persist($bill);
    //            $em->flush();
    //
    //            $this->get('session')->getFlashBag()->add('info', 'The Bill has been xxx successfully.');
    //
    //            return $this->redirect($this->generateUrl('path_to_target'));
    //        }
    //    }
    //
    //    return (new Response())
    //        ->setStatusCode(403)
    //        ->setContent('Message here');
    //    return new RedirectResponse($this->generateUrl('path_to_target'));
    //    return $this->render('HealthSystemBundle:Default:bill.html.twig');
    //    return $this->render(
    //        'HealthSystemBundle:Bill:bill.html.twig',
    //        [
    //            ''     => $,
    //            'form' => $form->createView(),
    //        ],
    //        //$response / null,
    //        //$renderParameters
    //    );
    //}

    // <user-additions part="actions">
    // </user-additions>

    // <user-additions part="listAction">
    public function listAction()
    {
        /** @var EntityManager $em */
        $em             = $this->getDoctrine()->getManager();
        $billRepository = new BillRepository($em);

        $bills = $billRepository->findAll(); // You can't do ORDER BY appointmentId because there seems to be a bug in Doctrine

        return $this->render(
            'HealthSystemBundle:Bill:listBill.html.twig',
            [
                'bills' => $bills,
            ]
        );
    }
    // </user-additions>

    // <user-additions part="addAction">
    public function addAction(Request $request)
    {
        $bill     = new Bill();
        $billType = new BillType();

        $form = $this->createForm($billType, $bill);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                /** @var EntityManager $em */
                $em = $this->getDoctrine()->getManager();
                $em->persist($bill);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'The Bill has been created successfully.');

                return $this->redirect($this->generateUrl('healthsystem_bill'));
            }
        }

        return $this->render(
            'HealthSystemBundle:Bill:addBill.html.twig',
            [
                'form' => $form->createView(),
            ],
            null
        );
    }
    // </user-additions>

    // <user-additions part="editAction">
    public function editAction(Request $request, $id)
    {
        /** @var EntityManager $em */
        $em             = $this->getDoctrine()->getManager();
        $billRepository = new BillRepository($em);

        $bill = $billRepository->findOneBy(['appointmentId' => $id]);

        if (null === $bill) {
            throw $this->createNotFoundException('No bill found for appointmentId ' . $id);
        }

        $billType = new BillType();

        $form = $this->createForm($billType, $bill);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                $em->persist($bill);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'The Bill has been edited successfully.');

                return $this->redirect($this->generateUrl('healthsystem_bill'));
            }
        }

        return $this->render(
            'HealthSystemBundle:Bill:editBill.html.twig',
            [
                'form'          => $form->createView(),
                'appointmentId' => $appointmentId,
            ]
        );
    }
    // </user-additions>

    // <user-additions part="deleteAction">
    public function deleteAction(Request $request, $id)
    {
        /** @var EntityManager $em */
        $em             = $this->getDoctrine()->getManager();
        $billRepository = new BillRepository($em);

        $bill = $billRepository->findOneBy(['appointmentId' => $id]);

        if (null === $bill) {
            throw $this->createNotFoundException('No bill found for appointmentId ' . $id);
        }

        $em->remove($bill);
        $em->flush();

        $this->get('session')->getFlashBag()->add('info', 'The Bill has been deleted successfully.');

        return $this->redirect($this->generateUrl('healthsystem_bill'));
    }
    // </user-additions>
}
