<?php
// HealthSystem\HealthSystemBundle\Controller\IllnessController.php

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
use HealthSystem\HealthSystemBundle\Form\Type\IllnessType;
use HealthSystem\HealthSystemBundle\Entity\Illness;
use HealthSystem\HealthSystemBundle\Entity\IllnessRepository;
use Doctrine\ORM\EntityManager;

// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpFoundation\RedirectResponse;
// use Symfony\Component\Security\Core\SecurityContext;

// use Doctrine\Common\Collections\ArrayCollection;

// use HealthSystem\HealthSystemBundle\Entity\Illness;
// use HealthSystem\HealthSystemBundle\Entity\Treatment;
// use HealthSystem\HealthSystemBundle\Entity\TreatmentRepository;

// <user-additions part="use">
// </user-additions>

/**
 * HealthSystem\HealthSystemBundle\Controller\IllnessController
 */
class IllnessController extends Controller
{
    //public function xxxAction(Request $request)
    //{
    //    /** @var EntityManager $em */
    //    $em  = $this->getDoctrine()->getManager();
    //    $xxx = $em->getRepository('HealthSystemBundle:Illness')->findXYZ();
    //
    //    $illnessRepository = new IllnessRepository($em);
    //
    //    $xxx = $em->getRepository('HealthSystemBundle:Treatment')->findXYZ();
    //
    //    $treatmentRepository = new TreatmentRepository($em);
    //
    //    $user = $this->get('security.context')->getToken()->getUser();
    //    if ($this->get('security.context')->isGranted('ROLE_XXX'))
    //
    //    $illness     = new Illness();
    //    $illnessType = new IllnessType();
    //
    //    $form = $this->createForm($illnessType, $illness);
    //
    //    if ($request->isMethod('POST')) {
    //        $form->submit($request->request->get($form->getName()));
    //
    //        if ($form->isValid()) {
    //            /** @var EntityManager $em */
    //            $em = $this->getDoctrine()->getManager();
    //            $em->persist($illness);
    //            $em->flush();
    //
    //            $this->get('session')->getFlashBag()->add('info', 'The Illness has been xxx successfully.');
    //
    //            return $this->redirect($this->generateUrl('path_to_target'));
    //        }
    //    }
    //
    //    return (new Response())
    //        ->setStatusCode(403)
    //        ->setContent('Message here');
    //    return new RedirectResponse($this->generateUrl('path_to_target'));
    //    return $this->render('HealthSystemBundle:Default:illness.html.twig');
    //    return $this->render(
    //        'HealthSystemBundle:Illness:illness.html.twig',
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
        $illnessRepository = new IllnessRepository($em);

        $illnesses = $illnessRepository->findBy([], ['code' => 'ASC']);

        return $this->render(
            'HealthSystemBundle:Illness:listIllness.html.twig',
            [
                'illnesses' => $illnesses,
            ]
        );
    }
    // </user-additions>

    // <user-additions part="addAction">
    public function addAction(Request $request)
    {
        $illness     = new Illness();
        $illnessType = new IllnessType();

        $form = $this->createForm($illnessType, $illness);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                /** @var EntityManager $em */
                $em = $this->getDoctrine()->getManager();
                $em->persist($illness);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'The Illness has been created successfully.');

                return $this->redirect($this->generateUrl('healthsystem_illness'));
            }
        }

        return $this->render(
            'HealthSystemBundle:Illness:addIllness.html.twig',
            [
                'form' => $form->createView(),
            ],
            null
        );
    }
    // </user-additions>

    // <user-additions part="editAction">
    public function editAction(Request $request, $code)
    {
        /** @var EntityManager $em */
        $em                = $this->getDoctrine()->getManager();
        $illnessRepository = new IllnessRepository($em);

        $illness = $illnessRepository->findOneBy(['code' => $code]);

        if (null === $illness) {
            throw $this->createNotFoundException('No illness found for code ' . $code);
        }

        $illnessType = new IllnessType();

        $form = $this->createForm($illnessType, $illness);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                $em->persist($illness);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'The Illness has been edited successfully.');

                return $this->redirect($this->generateUrl('healthsystem_illness'));
            }
        }

        return $this->render(
            'HealthSystemBundle:Illness:editIllness.html.twig',
            [
                'form' => $form->createView(),
                'code' => $code,
            ]
        );
    }
    // </user-additions>

    // <user-additions part="deleteAction">
    public function deleteAction(Request $request, $code)
    {
        /** @var EntityManager $em */
        $em                = $this->getDoctrine()->getManager();
        $illnessRepository = new IllnessRepository($em);

        $illness = $illnessRepository->findOneBy(['code' => $code]);

        if (null === $illness) {
            throw $this->createNotFoundException('No illness found for code ' . $code);
        }

        $em->remove($illness);
        $em->flush();

        $this->get('session')->getFlashBag()->add('info', 'The Illness has been deleted successfully.');

        return $this->redirect($this->generateUrl('healthsystem_illness'));
    }
    // </user-additions>
}
