<?php
// HealthSystem\HealthSystemBundle\Controller\SymptomController.php

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
use HealthSystem\HealthSystemBundle\Form\Type\SymptomType;
use HealthSystem\HealthSystemBundle\Entity\Symptom;
use HealthSystem\HealthSystemBundle\Entity\SymptomRepository;
use Doctrine\ORM\EntityManager;

// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpFoundation\RedirectResponse;
// use Symfony\Component\Security\Core\SecurityContext;

// use Doctrine\Common\Collections\ArrayCollection;

// use HealthSystem\HealthSystemBundle\Entity\Symptom;
// use HealthSystem\HealthSystemBundle\Entity\Patient;
// use HealthSystem\HealthSystemBundle\Entity\PatientRepository;
// use HealthSystem\HealthSystemBundle\Entity\Treatment;
// use HealthSystem\HealthSystemBundle\Entity\TreatmentRepository;

// <user-additions part="use">
// </user-additions>

/**
 * HealthSystem\HealthSystemBundle\Controller\SymptomController
 */
class SymptomController extends Controller
{
    //public function xxxAction(Request $request)
    //{
    //    /** @var EntityManager $em */
    //    $em  = $this->getDoctrine()->getManager();
    //    $xxx = $em->getRepository('HealthSystemBundle:Symptom')->findXYZ();
    //
    //    $symptomRepository = new SymptomRepository($em);
    //
    //    $xxx = $em->getRepository('HealthSystemBundle:Patient')->findXYZ();
    //    $xxx = $em->getRepository('HealthSystemBundle:Treatment')->findXYZ();
    //
    //    $patientRepository   = new PatientRepository($em);
    //    $treatmentRepository = new TreatmentRepository($em);
    //
    //    $user = $this->get('security.context')->getToken()->getUser();
    //    if ($this->get('security.context')->isGranted('ROLE_XXX'))
    //
    //    $symptom     = new Symptom();
    //    $symptomType = new SymptomType();
    //
    //    $form = $this->createForm($symptomType, $symptom);
    //
    //    if ($request->isMethod('POST')) {
    //        $form->submit($request->request->get($form->getName()));
    //
    //        if ($form->isValid()) {
    //            /** @var EntityManager $em */
    //            $em = $this->getDoctrine()->getManager();
    //            $em->persist($symptom);
    //            $em->flush();
    //
    //            $this->get('session')->getFlashBag()->add('info', 'The Symptom has been xxx successfully.');
    //
    //            return $this->redirect($this->generateUrl('path_to_target'));
    //        }
    //    }
    //
    //    return (new Response())
    //        ->setStatusCode(403)
    //        ->setContent('Message here');
    //    return new RedirectResponse($this->generateUrl('path_to_target'));
    //    return $this->render('HealthSystemBundle:Default:symptom.html.twig');
    //    return $this->render(
    //        'HealthSystemBundle:Symptom:symptom.html.twig',
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
        $symptomRepository = new SymptomRepository($em);

        $symptoms = $symptomRepository->findBy([], ['name' => 'ASC']);

        return $this->render(
            'HealthSystemBundle:Symptom:listSymptom.html.twig',
            [
                'symptoms' => $symptoms,
            ]
        );
    }
    // </user-additions>

    // <user-additions part="addAction">
    public function addAction(Request $request)
    {
        $symptom     = new Symptom();
        $symptomType = new SymptomType();

        $form = $this->createForm($symptomType, $symptom);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                /** @var EntityManager $em */
                $em = $this->getDoctrine()->getManager();
                $em->persist($symptom);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'The Symptom has been created successfully.');

                return $this->redirect($this->generateUrl('healthsystem_symptom'));
            }
        }

        return $this->render(
            'HealthSystemBundle:Symptom:addSymptom.html.twig',
            [
                'form' => $form->createView(),
            ],
            null
        );
    }
    // </user-additions>

    // <user-additions part="editAction">
    public function editAction(Request $request, $name)
    {
        /** @var EntityManager $em */
        $em                = $this->getDoctrine()->getManager();
        $symptomRepository = new SymptomRepository($em);

        $symptom = $symptomRepository->findOneBy(['name' => $name]);

        if (null === $symptom) {
            throw $this->createNotFoundException('No symptom found for name ' . $name);
        }

        $symptomType = new SymptomType();

        $form = $this->createForm($symptomType, $symptom);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                $em->persist($symptom);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'The Symptom has been edited successfully.');

                return $this->redirect($this->generateUrl('healthsystem_symptom'));
            }
        }

        return $this->render(
            'HealthSystemBundle:Symptom:editSymptom.html.twig',
            [
                'form' => $form->createView(),
                'name' => $name,
            ]
        );
    }
    // </user-additions>

    // <user-additions part="deleteAction">
    public function deleteAction(Request $request, $name)
    {
        /** @var EntityManager $em */
        $em                = $this->getDoctrine()->getManager();
        $symptomRepository = new SymptomRepository($em);

        $symptom = $symptomRepository->findOneBy(['name' => $name]);

        if (null === $symptom) {
            throw $this->createNotFoundException('No symptom found for name ' . $name);
        }

        $em->remove($symptom);
        $em->flush();

        $this->get('session')->getFlashBag()->add('info', 'The Symptom has been deleted successfully.');

        return $this->redirect($this->generateUrl('healthsystem_symptom'));
    }
    // </user-additions>
}
