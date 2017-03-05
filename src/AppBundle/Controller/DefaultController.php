<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PartidoController extends Controller
{
    /**
     * @Route("/", name="portada")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }
}
