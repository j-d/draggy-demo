<?php

namespace HealthSystem\HealthSystemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('HealthSystemBundle:Default:index.html.twig', array('name' => $name));
    }
}
