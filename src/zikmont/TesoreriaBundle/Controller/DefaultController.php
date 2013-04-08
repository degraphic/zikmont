<?php

namespace zikmont\TesoreriaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('zikmontTesoreriaBundle:Default:index.html.twig', array('name' => $name));
    }
}
