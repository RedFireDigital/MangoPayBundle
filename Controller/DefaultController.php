<?php

namespace PartFire\MangoPayBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PartFireMangoPayBundle:Default:index.html.twig');
    }
}
