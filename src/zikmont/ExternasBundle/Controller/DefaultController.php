<?php

namespace zikmont\ExternasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('zikmontExternasBundle:Default:index.html.twig', array('name' => $name));
    }
    
}
