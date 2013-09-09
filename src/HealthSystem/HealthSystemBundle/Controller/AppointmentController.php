<?php
// HealthSystem\HealthSystemBundle\Controller\AppointmentController.php

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
use HealthSystem\HealthSystemBundle\Form\Type\AppointmentType;
use HealthSystem\HealthSystemBundle\Entity\Appointment;
use HealthSystem\HealthSystemBundle\Entity\AppointmentRepository;
use Doctrine\ORM\EntityManager;

// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpFoundation\RedirectResponse;
// use Symfony\Component\Security\Core\SecurityContext;

// use Doctrine\Common\Collections\ArrayCollection;

// use HealthSystem\HealthSystemBundle\Entity\Appointment;
// use HealthSystem\HealthSystemBundle\Entity\Patient;
// use HealthSystem\HealthSystemBundle\Entity\PatientRepository;
// use HealthSystem\HealthSystemBundle\Entity\Doctor;
// use HealthSystem\HealthSystemBundle\Entity\DoctorRepository;
// use HealthSystem\HealthSystemBundle\Entity\Bill;
// use HealthSystem\HealthSystemBundle\Entity\BillRepository;

// <user-additions part="use">
// </user-additions>

/**
 * HealthSystem\HealthSystemBundle\Controller\AppointmentController
 */
class AppointmentController extends Controller
{
    //public function xxxAction(Request $request)
    //{
    //    /** @var EntityManager $em */
    //    $em  = $this->getDoctrine()->getManager();
    //    $xxx = $em->getRepository('HealthSystemBundle:Appointment')->findXYZ();
    //
    //    $appointmentRepository = new AppointmentRepository($em);
    //
    //    $xxx = $em->getRepository('HealthSystemBundle:Patient')->findXYZ();
    //    $xxx = $em->getRepository('HealthSystemBundle:Doctor')->findXYZ();
    //    $xxx = $em->getRepository('HealthSystemBundle:Bill')->findXYZ();
    //
    //    $patientRepository = new PatientRepository($em);
    //    $doctorRepository  = new DoctorRepository($em);
    //    $billRepository    = new BillRepository($em);
    //
    //    $user = $this->get('security.context')->getToken()->getUser();
    //    if ($this->get('security.context')->isGranted('ROLE_XXX'))
    //
    //    $appointment     = new Appointment();
    //    $appointmentType = new AppointmentType();
    //
    //    $form = $this->createForm($appointmentType, $appointment);
    //
    //    if ($request->isMethod('POST')) {
    //        $form->submit($request->request->get($form->getName()));
    //
    //        if ($form->isValid()) {
    //            /** @var EntityManager $em */
    //            $em = $this->getDoctrine()->getManager();
    //            $em->persist($appointment);
    //            $em->flush();
    //
    //            $this->get('session')->getFlashBag()->add('info', 'The Appointment has been xxx successfully.');
    //
    //            return $this->redirect($this->generateUrl('path_to_target'));
    //        }
    //    }
    //
    //    return (new Response())
    //        ->setStatusCode(403)
    //        ->setContent('Message here');
    //    return new RedirectResponse($this->generateUrl('path_to_target'));
    //    return $this->render('HealthSystemBundle:Default:appointment.html.twig');
    //    return $this->render(
    //        'HealthSystemBundle:Appointment:appointment.html.twig',
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
        $em                    = $this->getDoctrine()->getManager();
        $appointmentRepository = new AppointmentRepository($em);

        $appointments = $appointmentRepository->findBy([], ['id' => 'ASC']);

        return $this->render(
            'HealthSystemBundle:Appointment:listAppointment.html.twig',
            [
                'appointments' => $appointments,
            ]
        );
    }
    // </user-additions>

    // <user-additions part="addAction">
    public function addAction(Request $request)
    {
        $appointment     = new Appointment();
        $appointmentType = new AppointmentType();

        $form = $this->createForm($appointmentType, $appointment);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                /** @var EntityManager $em */
                $em = $this->getDoctrine()->getManager();
                $em->persist($appointment);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'The Appointment has been created successfully.');

                return $this->redirect($this->generateUrl('healthsystem_appointment'));
            }
        }

        return $this->render(
            'HealthSystemBundle:Appointment:addAppointment.html.twig',
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
        $em                    = $this->getDoctrine()->getManager();
        $appointmentRepository = new AppointmentRepository($em);

        $appointment = $appointmentRepository->findOneBy(['id' => $id]);

        if (null === $appointment) {
            throw $this->createNotFoundException('No appointment found for id ' . $id);
        }

        $appointmentType = new AppointmentType();

        $form = $this->createForm($appointmentType, $appointment);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                $em->persist($appointment);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'The Appointment has been edited successfully.');

                return $this->redirect($this->generateUrl('healthsystem_appointment'));
            }
        }

        return $this->render(
            'HealthSystemBundle:Appointment:editAppointment.html.twig',
            [
                'form' => $form->createView(),
                'id'   => $id,
            ]
        );
    }
    // </user-additions>

    // <user-additions part="deleteAction">
    public function deleteAction(Request $request, $id)
    {
        /** @var EntityManager $em */
        $em                    = $this->getDoctrine()->getManager();
        $appointmentRepository = new AppointmentRepository($em);

        $appointment = $appointmentRepository->findOneBy(['id' => $id]);

        if (null === $appointment) {
            throw $this->createNotFoundException('No appointment found for id ' . $id);
        }

        $em->remove($appointment);
        $em->flush();

        $this->get('session')->getFlashBag()->add('info', 'The Appointment has been deleted successfully.');

        return $this->redirect($this->generateUrl('healthsystem_appointment'));
    }
    // </user-additions>
}
