<?php
// HealthSystem\HealthSystemBundle\Controller\MedicalHistoryController.php

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
use HealthSystem\HealthSystemBundle\Form\Type\MedicalHistoryType;
use HealthSystem\HealthSystemBundle\Entity\MedicalHistory;
use HealthSystem\HealthSystemBundle\Entity\MedicalHistoryRepository;
use Doctrine\ORM\EntityManager;

// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpFoundation\RedirectResponse;
// use Symfony\Component\Security\Core\SecurityContext;

// use Doctrine\Common\Collections\ArrayCollection;

// use HealthSystem\HealthSystemBundle\Entity\MedicalHistory;
// use HealthSystem\HealthSystemBundle\Entity\Patient;
// use HealthSystem\HealthSystemBundle\Entity\PatientRepository;

// <user-additions part="use">
// </user-additions>

/**
 * HealthSystem\HealthSystemBundle\Controller\MedicalHistoryController
 */
class MedicalHistoryController extends Controller
{
    //public function xxxAction(Request $request)
    //{
    //    /** @var EntityManager $em */
    //    $em  = $this->getDoctrine()->getManager();
    //    $xxx = $em->getRepository('HealthSystemBundle:MedicalHistory')->findXYZ();
    //
    //    $medicalHistoryRepository = new MedicalHistoryRepository($em);
    //
    //    $xxx = $em->getRepository('HealthSystemBundle:Patient')->findXYZ();
    //
    //    $patientRepository = new PatientRepository($em);
    //
    //    $user = $this->get('security.context')->getToken()->getUser();
    //    if ($this->get('security.context')->isGranted('ROLE_XXX'))
    //
    //    $medicalHistory     = new MedicalHistory();
    //    $medicalHistoryType = new MedicalHistoryType();
    //
    //    $form = $this->createForm($medicalHistoryType, $medicalHistory);
    //
    //    if ($request->isMethod('POST')) {
    //        $form->submit($request->request->get($form->getName()));
    //
    //        if ($form->isValid()) {
    //            /** @var EntityManager $em */
    //            $em = $this->getDoctrine()->getManager();
    //            $em->persist($medicalHistory);
    //            $em->flush();
    //
    //            $this->get('session')->getFlashBag()->add('info', 'The MedicalHistory has been xxx successfully.');
    //
    //            return $this->redirect($this->generateUrl('path_to_target'));
    //        }
    //    }
    //
    //    return (new Response())
    //        ->setStatusCode(403)
    //        ->setContent('Message here');
    //    return new RedirectResponse($this->generateUrl('path_to_target'));
    //    return $this->render('HealthSystemBundle:Default:medicalHistory.html.twig');
    //    return $this->render(
    //        'HealthSystemBundle:MedicalHistory:medicalhistory.html.twig',
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
        $em                       = $this->getDoctrine()->getManager();
        $medicalHistoryRepository = new MedicalHistoryRepository($em);

        $medicalHistories = $medicalHistoryRepository->findAll(); // You can't do ORDER BY patientId because there seems to be a bug in Doctrine

        return $this->render(
            'HealthSystemBundle:MedicalHistory:listMedicalHistory.html.twig',
            [
                'medicalHistories' => $medicalHistories,
            ]
        );
    }
    // </user-additions>

    // <user-additions part="addAction">
    public function addAction(Request $request)
    {
        $medicalHistory     = new MedicalHistory();
        $medicalHistoryType = new MedicalHistoryType();

        $form = $this->createForm($medicalHistoryType, $medicalHistory);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                /** @var EntityManager $em */
                $em = $this->getDoctrine()->getManager();
                $em->persist($medicalHistory);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'The MedicalHistory has been created successfully.');

                return $this->redirect($this->generateUrl('healthsystem_medicalhistory'));
            }
        }

        return $this->render(
            'HealthSystemBundle:MedicalHistory:addMedicalHistory.html.twig',
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
        $em                       = $this->getDoctrine()->getManager();
        $medicalHistoryRepository = new MedicalHistoryRepository($em);

        $medicalHistory = $medicalHistoryRepository->findOneBy(['patientId' => $id]);

        if (null === $medicalHistory) {
            throw $this->createNotFoundException('No medicalHistory found for patientId ' . $id);
        }

        $medicalHistoryType = new MedicalHistoryType();

        $form = $this->createForm($medicalHistoryType, $medicalHistory);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                $em->persist($medicalHistory);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'The MedicalHistory has been edited successfully.');

                return $this->redirect($this->generateUrl('healthsystem_medicalhistory'));
            }
        }

        return $this->render(
            'HealthSystemBundle:MedicalHistory:editMedicalHistory.html.twig',
            [
                'form'      => $form->createView(),
                'patientId' => $patientId,
            ]
        );
    }
    // </user-additions>

    // <user-additions part="deleteAction">
    public function deleteAction(Request $request, $id)
    {
        /** @var EntityManager $em */
        $em                       = $this->getDoctrine()->getManager();
        $medicalHistoryRepository = new MedicalHistoryRepository($em);

        $medicalHistory = $medicalHistoryRepository->findOneBy(['patientId' => $id]);

        if (null === $medicalHistory) {
            throw $this->createNotFoundException('No medicalHistory found for patientId ' . $id);
        }

        $em->remove($medicalHistory);
        $em->flush();

        $this->get('session')->getFlashBag()->add('info', 'The MedicalHistory has been deleted successfully.');

        return $this->redirect($this->generateUrl('healthsystem_medicalhistory'));
    }
    // </user-additions>
}
