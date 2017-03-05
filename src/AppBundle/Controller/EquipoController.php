<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Equipo;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EquipoController extends Controller
{
    /**
     * @Route("/equipos", name="equipo_listar")
     * @Security("has_role('ROLE_COMENTARISTA')")
     */
    public function listadoAction()
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $equipos = $em->createQueryBuilder()
            ->select('e')
            ->addSelect('j')
            ->from('AppBundle:Equipo', 'e')
            ->join('e.entrenador', 'j')
            ->orderBy('e.denominacion')
            ->getQuery()
            ->getResult();

        return $this->render('equipo/listar.html.twig', [
            'equipos' => $equipos
        ]);
    }

    /**
     * @Route("/equipo/plantilla/{equipo}", name="equipo_plantilla")
     * @Security("has_role('ROLE_COMENTARISTA')")
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
