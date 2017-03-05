<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Equipo;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EquipoController extends Controller
{
    /**
     * @Route("/equipos", name="equipo_listar")
     */
    public function indexAction()
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $equipos = $em->createQueryBuilder()
            ->select('e')
            ->from('AppBundle:Equipo', 'e')
            ->orderBy('e.denominacion')
            ->getQuery()
            ->getResult();

        return $this->render('equipo/listar.html.twig', [
            'equipos' => $equipos
        ]);
    }

    /**
     * @Route("/equipo/plantilla/{equipo}", name="equipo_plantilla")
     */
    public function plantillaAction(Equipo $equipo)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $plantilla = $em->createQueryBuilder()
            ->select('j')
            ->from('AppBundle:Jugador', 'j')
            ->where('j.equipo = :equipo')
            ->setParameter('equipo', $equipo)
            ->orderBy('j.apellidos')
            ->addOrderBy('j.nombre')
            ->getQuery()
            ->getResult();

        return $this->render('equipo/plantilla.html.twig', [
            'plantilla' => $plantilla,
            'equipo' => $equipo
        ]);
    }

}
