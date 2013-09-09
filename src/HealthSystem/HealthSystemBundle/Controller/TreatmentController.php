<?php
// HealthSystem\HealthSystemBundle\Controller\TreatmentController.php

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
use HealthSystem\HealthSystemBundle\Form\Type\TreatmentType;
use HealthSystem\HealthSystemBundle\Entity\Treatment;
use HealthSystem\HealthSystemBundle\Entity\TreatmentRepository;
use Doctrine\ORM\EntityManager;

// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpFoundation\RedirectResponse;
// use Symfony\Component\Security\Core\SecurityContext;

// use Doctrine\Common\Collections\ArrayCollection;

// use HealthSystem\HealthSystemBundle\Entity\Treatment;
// use HealthSystem\HealthSystemBundle\Entity\Symptom;
// use HealthSystem\HealthSystemBundle\Entity\SymptomRepository;
// use HealthSystem\HealthSystemBundle\Entity\Illness;
// use HealthSystem\HealthSystemBundle\Entity\IllnessRepository;

// <user-additions part="use">
// </user-additions>

/**
 * HealthSystem\HealthSystemBundle\Controller\TreatmentController
 */
class TreatmentController extends Controller
{
    //public function xxxAction(Request $request)
    //{
    //    /** @var EntityManager $em */
    //    $em  = $this->getDoctrine()->getManager();
    //    $xxx = $em->getRepository('HealthSystemBundle:Treatment')->findXYZ();
    //
    //    $treatmentRepository = new TreatmentRepository($em);
    //
    //    $xxx = $em->getRepository('HealthSystemBundle:Symptom')->findXYZ();
    //    $xxx = $em->getRepository('HealthSystemBundle:Illness')->findXYZ();
    //
    //    $symptomRepository = new SymptomRepository($em);
    //    $illnessRepository = new IllnessRepository($em);
    //
    //    $user = $this->get('security.context')->getToken()->getUser();
    //    if ($this->get('security.context')->isGranted('ROLE_XXX'))
    //
    //    $treatment     = new Treatment();
    //    $treatmentType = new TreatmentType();
    //
    //    $form = $this->createForm($treatmentType, $treatment);
    //
    //    if ($request->isMethod('POST')) {
    //        $form->submit($request->request->get($form->getName()));
    //
    //        if ($form->isValid()) {
    //            /** @var EntityManager $em */
    //            $em = $this->getDoctrine()->getManager();
    //            $em->persist($treatment);
    //            $em->flush();
    //
    //            $this->get('session')->getFlashBag()->add('info', 'The Treatment has been xxx successfully.');
    //
    //            return $this->redirect($this->generateUrl('path_to_target'));
    //        }
    //    }
    //
    //    return (new Response())
    //        ->setStatusCode(403)
    //        ->setContent('Message here');
    //    return new RedirectResponse($this->generateUrl('path_to_target'));
    //    return $this->render('HealthSystemBundle:Default:treatment.html.twig');
    //    return $this->render(
    //        'HealthSystemBundle:Treatment:treatment.html.twig',
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
        $em                  = $this->getDoctrine()->getManager();
        $treatmentRepository = new TreatmentRepository($em);

        $treatments = $treatmentRepository->findBy([], ['id' => 'ASC']);

        return $this->render(
            'HealthSystemBundle:Treatment:listTreatment.html.twig',
            [
                'treatments' => $treatments,
            ]
        );
    }
    // </user-additions>

    // <user-additions part="addAction">
    public function addAction(Request $request)
    {
        $treatment     = new Treatment();
        $treatmentType = new TreatmentType();

        $form = $this->createForm($treatmentType, $treatment);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                /** @var EntityManager $em */
                $em = $this->getDoctrine()->getManager();
                $em->persist($treatment);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'The Treatment has been created successfully.');

                return $this->redirect($this->generateUrl('healthsystem_treatment'));
            }
        }

        return $this->render(
            'HealthSystemBundle:Treatment:addTreatment.html.twig',
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
        $em                  = $this->getDoctrine()->getManager();
        $treatmentRepository = new TreatmentRepository($em);

        $treatment = $treatmentRepository->findOneBy(['id' => $id]);

        if (null === $treatment) {
            throw $this->createNotFoundException('No treatment found for id ' . $id);
        }

        $treatmentType = new TreatmentType();

        $form = $this->createForm($treatmentType, $treatment);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                $em->persist($treatment);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'The Treatment has been edited successfully.');

                return $this->redirect($this->generateUrl('healthsystem_treatment'));
            }
        }

        return $this->render(
            'HealthSystemBundle:Treatment:editTreatment.html.twig',
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
        $em                  = $this->getDoctrine()->getManager();
        $treatmentRepository = new TreatmentRepository($em);

        $treatment = $treatmentRepository->findOneBy(['id' => $id]);

        if (null === $treatment) {
            throw $this->createNotFoundException('No treatment found for id ' . $id);
        }

        $em->remove($treatment);
        $em->flush();

        $this->get('session')->getFlashBag()->add('info', 'The Treatment has been deleted successfully.');

        return $this->redirect($this->generateUrl('healthsystem_treatment'));
    }
    // </user-additions>
}
