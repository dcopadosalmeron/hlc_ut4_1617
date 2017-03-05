<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="resultados")
     */
    public function indexAction()
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $em->createQueryBuilder()
            ->select('p')
            ->from('AppBundle:Partido', 'p')
            ->orderBy('p.fechaCelebracion', 'DESC')
            ->getQuery()
            ->getResult();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }
}
