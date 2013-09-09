<?php
// HealthSystem\HealthSystemBundle\Controller\PatientController.php

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
use HealthSystem\HealthSystemBundle\Form\Type\PatientType;
use HealthSystem\HealthSystemBundle\Entity\Patient;
use HealthSystem\HealthSystemBundle\Entity\PatientRepository;
use Doctrine\ORM\EntityManager;

// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpFoundation\RedirectResponse;
// use Symfony\Component\Security\Core\SecurityContext;

// use Doctrine\Common\Collections\ArrayCollection;

// use HealthSystem\HealthSystemBundle\Entity\Patient;
// use HealthSystem\HealthSystemBundle\Entity\Symptom;
// use HealthSystem\HealthSystemBundle\Entity\SymptomRepository;
// use HealthSystem\HealthSystemBundle\Entity\MedicalHistory;
// use HealthSystem\HealthSystemBundle\Entity\MedicalHistoryRepository;
// use HealthSystem\HealthSystemBundle\Entity\Appointment;
// use HealthSystem\HealthSystemBundle\Entity\AppointmentRepository;

// <user-additions part="use">
// </user-additions>

/**
 * HealthSystem\HealthSystemBundle\Controller\PatientController
 */
class PatientController extends Controller
{
    //public function xxxAction(Request $request)
    //{
    //    /** @var EntityManager $em */
    //    $em  = $this->getDoctrine()->getManager();
    //    $xxx = $em->getRepository('HealthSystemBundle:Patient')->findXYZ();
    //
    //    $patientRepository = new PatientRepository($em);
    //
    //    $xxx = $em->getRepository('HealthSystemBundle:Symptom')->findXYZ();
    //    $xxx = $em->getRepository('HealthSystemBundle:MedicalHistory')->findXYZ();
    //    $xxx = $em->getRepository('HealthSystemBundle:Appointment')->findXYZ();
    //
    //    $symptomRepository        = new SymptomRepository($em);
    //    $medicalHistoryRepository = new MedicalHistoryRepository($em);
    //    $appointmentRepository    = new AppointmentRepository($em);
    //
    //    $user = $this->get('security.context')->getToken()->getUser();
    //    if ($this->get('security.context')->isGranted('ROLE_XXX'))
    //
    //    $patient     = new Patient();
    //    $patientType = new PatientType();
    //
    //    $form = $this->createForm($patientType, $patient);
    //
    //    if ($request->isMethod('POST')) {
    //        $form->submit($request->request->get($form->getName()));
    //
    //        if ($form->isValid()) {
    //            /** @var EntityManager $em */
    //            $em = $this->getDoctrine()->getManager();
    //            $em->persist($patient);
    //            $em->flush();
    //
    //            $this->get('session')->getFlashBag()->add('info', 'The Patient has been xxx successfully.');
    //
    //            return $this->redirect($this->generateUrl('path_to_target'));
    //        }
    //    }
    //
    //    return (new Response())
    //        ->setStatusCode(403)
    //        ->setContent('Message here');
    //    return new RedirectResponse($this->generateUrl('path_to_target'));
    //    return $this->render('HealthSystemBundle:Default:patient.html.twig');
    //    return $this->render(
    //        'HealthSystemBundle:Patient:patient.html.twig',
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
        $em                = $this->getDoctrine()->getManager();
        $patientRepository = new PatientRepository($em);

        $patients = $patientRepository->findBy([], ['id' => 'ASC']);

        return $this->render(
            'HealthSystemBundle:Patient:listPatient.html.twig',
            [
                'patients' => $patients,
            ]
        );
    }
    // </user-additions>

    // <user-additions part="addAction">
    public function addAction(Request $request)
    {
        $patient     = new Patient();
        $patientType = new PatientType();

        $form = $this->createForm($patientType, $patient);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                /** @var EntityManager $em */
                $em = $this->getDoctrine()->getManager();
                $em->persist($patient);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'The Patient has been created successfully.');

                return $this->redirect($this->generateUrl('healthsystem_patient'));
            }
        }

        return $this->render(
            'HealthSystemBundle:Patient:addPatient.html.twig',
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
        $em                = $this->getDoctrine()->getManager();
        $patientRepository = new PatientRepository($em);

        $patient = $patientRepository->findOneBy(['id' => $id]);

        if (null === $patient) {
            throw $this->createNotFoundException('No patient found for id ' . $id);
        }

        $patientType = new PatientType();

        $form = $this->createForm($patientType, $patient);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                $em->persist($patient);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'The Patient has been edited successfully.');

                return $this->redirect($this->generateUrl('healthsystem_patient'));
            }
        }

        return $this->render(
            'HealthSystemBundle:Patient:editPatient.html.twig',
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
        $em                = $this->getDoctrine()->getManager();
        $patientRepository = new PatientRepository($em);

        $patient = $patientRepository->findOneBy(['id' => $id]);

        if (null === $patient) {
            throw $this->createNotFoundException('No patient found for id ' . $id);
        }

        $em->remove($patient);
        $em->flush();

        $this->get('session')->getFlashBag()->add('info', 'The Patient has been deleted successfully.');

        return $this->redirect($this->generateUrl('healthsystem_patient'));
    }
    // </user-additions>
}
