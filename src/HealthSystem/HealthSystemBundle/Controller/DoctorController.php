<?php
// HealthSystem\HealthSystemBundle\Controller\DoctorController.php

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
use HealthSystem\HealthSystemBundle\Form\Type\DoctorType;
use HealthSystem\HealthSystemBundle\Entity\Doctor;
use HealthSystem\HealthSystemBundle\Entity\DoctorRepository;
use Doctrine\ORM\EntityManager;

// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpFoundation\RedirectResponse;
// use Symfony\Component\Security\Core\SecurityContext;

// use Doctrine\Common\Collections\ArrayCollection;

// use HealthSystem\HealthSystemBundle\Entity\Doctor;
// use HealthSystem\HealthSystemBundle\Entity\Appointment;
// use HealthSystem\HealthSystemBundle\Entity\AppointmentRepository;

// <user-additions part="use">
// </user-additions>

/**
 * HealthSystem\HealthSystemBundle\Controller\DoctorController
 */
class DoctorController extends Controller
{
    //public function xxxAction(Request $request)
    //{
    //    /** @var EntityManager $em */
    //    $em  = $this->getDoctrine()->getManager();
    //    $xxx = $em->getRepository('HealthSystemBundle:Doctor')->findXYZ();
    //
    //    $doctorRepository = new DoctorRepository($em);
    //
    //    $xxx = $em->getRepository('HealthSystemBundle:Appointment')->findXYZ();
    //
    //    $appointmentRepository = new AppointmentRepository($em);
    //
    //    $user = $this->get('security.context')->getToken()->getUser();
    //    if ($this->get('security.context')->isGranted('ROLE_XXX'))
    //
    //    $doctor     = new Doctor();
    //    $doctorType = new DoctorType();
    //
    //    $form = $this->createForm($doctorType, $doctor);
    //
    //    if ($request->isMethod('POST')) {
    //        $form->submit($request->request->get($form->getName()));
    //
    //        if ($form->isValid()) {
    //            /** @var EntityManager $em */
    //            $em = $this->getDoctrine()->getManager();
    //            $em->persist($doctor);
    //            $em->flush();
    //
    //            $this->get('session')->getFlashBag()->add('info', 'The Doctor has been xxx successfully.');
    //
    //            return $this->redirect($this->generateUrl('path_to_target'));
    //        }
    //    }
    //
    //    return (new Response())
    //        ->setStatusCode(403)
    //        ->setContent('Message here');
    //    return new RedirectResponse($this->generateUrl('path_to_target'));
    //    return $this->render('HealthSystemBundle:Default:doctor.html.twig');
    //    return $this->render(
    //        'HealthSystemBundle:Doctor:doctor.html.twig',
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
        $em               = $this->getDoctrine()->getManager();
        $doctorRepository = new DoctorRepository($em);

        $doctors = $doctorRepository->findBy([], ['id' => 'ASC']);

        return $this->render(
            'HealthSystemBundle:Doctor:listDoctor.html.twig',
            [
                'doctors' => $doctors,
            ]
        );
    }
    // </user-additions>

    // <user-additions part="addAction">
    public function addAction(Request $request)
    {
        $doctor     = new Doctor();
        $doctorType = new DoctorType();

        $form = $this->createForm($doctorType, $doctor);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                /** @var EntityManager $em */
                $em = $this->getDoctrine()->getManager();
                $em->persist($doctor);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'The Doctor has been created successfully.');

                return $this->redirect($this->generateUrl('healthsystem_doctor'));
            }
        }

        return $this->render(
            'HealthSystemBundle:Doctor:addDoctor.html.twig',
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
        $em               = $this->getDoctrine()->getManager();
        $doctorRepository = new DoctorRepository($em);

        $doctor = $doctorRepository->findOneBy(['id' => $id]);

        if (null === $doctor) {
            throw $this->createNotFoundException('No doctor found for id ' . $id);
        }

        $doctorType = new DoctorType();

        $form = $this->createForm($doctorType, $doctor);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                $em->persist($doctor);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'The Doctor has been edited successfully.');

                return $this->redirect($this->generateUrl('healthsystem_doctor'));
            }
        }

        return $this->render(
            'HealthSystemBundle:Doctor:editDoctor.html.twig',
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
        $em               = $this->getDoctrine()->getManager();
        $doctorRepository = new DoctorRepository($em);

        $doctor = $doctorRepository->findOneBy(['id' => $id]);

        if (null === $doctor) {
            throw $this->createNotFoundException('No doctor found for id ' . $id);
        }

        $em->remove($doctor);
        $em->flush();

        $this->get('session')->getFlashBag()->add('info', 'The Doctor has been deleted successfully.');

        return $this->redirect($this->generateUrl('healthsystem_doctor'));
    }
    // </user-additions>
}
