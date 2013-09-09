<?php
// HealthSystem\HealthSystemBundle\Controller\NurseController.php

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
use HealthSystem\HealthSystemBundle\Form\Type\NurseType;
use HealthSystem\HealthSystemBundle\Entity\Nurse;
use HealthSystem\HealthSystemBundle\Entity\NurseRepository;
use Doctrine\ORM\EntityManager;

// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpFoundation\RedirectResponse;
// use Symfony\Component\Security\Core\SecurityContext;

// use Doctrine\Common\Collections\ArrayCollection;

// use HealthSystem\HealthSystemBundle\Entity\Nurse;

// <user-additions part="use">
// </user-additions>

/**
 * HealthSystem\HealthSystemBundle\Controller\NurseController
 */
class NurseController extends Controller
{
    //public function xxxAction(Request $request)
    //{
    //    /** @var EntityManager $em */
    //    $em  = $this->getDoctrine()->getManager();
    //    $xxx = $em->getRepository('HealthSystemBundle:Nurse')->findXYZ();
    //
    //    $nurseRepository = new NurseRepository($em);
    //
    //    $user = $this->get('security.context')->getToken()->getUser();
    //    if ($this->get('security.context')->isGranted('ROLE_XXX'))
    //
    //    $nurse     = new Nurse();
    //    $nurseType = new NurseType();
    //
    //    $form = $this->createForm($nurseType, $nurse);
    //
    //    if ($request->isMethod('POST')) {
    //        $form->submit($request->request->get($form->getName()));
    //
    //        if ($form->isValid()) {
    //            /** @var EntityManager $em */
    //            $em = $this->getDoctrine()->getManager();
    //            $em->persist($nurse);
    //            $em->flush();
    //
    //            $this->get('session')->getFlashBag()->add('info', 'The Nurse has been xxx successfully.');
    //
    //            return $this->redirect($this->generateUrl('path_to_target'));
    //        }
    //    }
    //
    //    return (new Response())
    //        ->setStatusCode(403)
    //        ->setContent('Message here');
    //    return new RedirectResponse($this->generateUrl('path_to_target'));
    //    return $this->render('HealthSystemBundle:Default:nurse.html.twig');
    //    return $this->render(
    //        'HealthSystemBundle:Nurse:nurse.html.twig',
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
        $em              = $this->getDoctrine()->getManager();
        $nurseRepository = new NurseRepository($em);

        $nurses = $nurseRepository->findBy([], ['id' => 'ASC']);

        return $this->render(
            'HealthSystemBundle:Nurse:listNurse.html.twig',
            [
                'nurses' => $nurses,
            ]
        );
    }
    // </user-additions>

    // <user-additions part="addAction">
    public function addAction(Request $request)
    {
        $nurse     = new Nurse();
        $nurseType = new NurseType();

        $form = $this->createForm($nurseType, $nurse);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                /** @var EntityManager $em */
                $em = $this->getDoctrine()->getManager();
                $em->persist($nurse);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'The Nurse has been created successfully.');

                return $this->redirect($this->generateUrl('healthsystem_nurse'));
            }
        }

        return $this->render(
            'HealthSystemBundle:Nurse:addNurse.html.twig',
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
        $em              = $this->getDoctrine()->getManager();
        $nurseRepository = new NurseRepository($em);

        $nurse = $nurseRepository->findOneBy(['id' => $id]);

        if (null === $nurse) {
            throw $this->createNotFoundException('No nurse found for id ' . $id);
        }

        $nurseType = new NurseType();

        $form = $this->createForm($nurseType, $nurse);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                $em->persist($nurse);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'The Nurse has been edited successfully.');

                return $this->redirect($this->generateUrl('healthsystem_nurse'));
            }
        }

        return $this->render(
            'HealthSystemBundle:Nurse:editNurse.html.twig',
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
        $em              = $this->getDoctrine()->getManager();
        $nurseRepository = new NurseRepository($em);

        $nurse = $nurseRepository->findOneBy(['id' => $id]);

        if (null === $nurse) {
            throw $this->createNotFoundException('No nurse found for id ' . $id);
        }

        $em->remove($nurse);
        $em->flush();

        $this->get('session')->getFlashBag()->add('info', 'The Nurse has been deleted successfully.');

        return $this->redirect($this->generateUrl('healthsystem_nurse'));
    }
    // </user-additions>
}
