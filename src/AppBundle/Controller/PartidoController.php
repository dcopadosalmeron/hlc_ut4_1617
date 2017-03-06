<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Partido;
use AppBundle\Form\Type\PartidoType;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PartidoController extends Controller
{
    /**
     * @Route("/", name="resultados")
     */
    public function indexAction()
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $partidos = $em->createQueryBuilder()
            ->select('p')
            ->from('AppBundle:Partido', 'p')
            ->orderBy('p.fechaCelebracion', 'DESC')
            ->getQuery()
            ->getResult();

        return $this->render('partido/listado.html.twig', [
            'partidos' => $partidos
        ]);
    }

    /**
     * @Route("/partido/modificar/{id}", name="partido_form")
     * @Route("/partido/nuevo", name="partido_nuevo")
     * @Security("has_role('ROLE_ARBITRO')")
     */
    public function nuevoAction(Request $request, Partido $partido = null)
    {
        $em = $this->getDoctrine()->getManager();

        if (null === $partido) {
            $partido = new Partido();
            $em->persist($partido);

            // poner por defecto la fecha hoy
            $partido->setFechaCelebracion(new \DateTime());
        }

        $form = $this->createForm(PartidoType::class, $partido);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            try {
                $em->flush();
                $this->addFlash('exito', 'Cambios guardados con éxito');
                return $this->redirectToRoute('partido_listar');
        }
            catch (\Exception $e) {
                $this->addFlash('error', 'No se ha podido modificar el partido');
            }
        }

        return $this->render('partido/form.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/partido/listar", name="partido_listar")
     * @Security("has_role('ROLE_ARBITRO')")
     */
    public function listadoAction()
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $partidos = $em->createQueryBuilder()
            ->select('p')
            ->from('AppBundle:Partido', 'p')
            ->orderBy('p.fechaCelebracion')
            ->getQuery()
            ->getResult();

        return $this->render('partido/listado_arbitro.html.twig', [
            'partidos' => $partidos
        ]);
    }

    /**
     * @Route("/partido/borrar/{id}", name="partido_borrar", methods={"GET"})
     * @Security("has_role('ROLE_ARBITRO')")
     */
    public function confirmarBorrarAction(Partido $partido)
    {
        return $this->render('partido/confirmar_borrado.html.twig', [
            'partido' => $partido
        ]);
    }

    /**
     * @Route("/partido/borrar/{id}", name="partido_borrar_confirmado", methods={"POST"})
     * @Security("has_role('ROLE_ARBITRO')")
     */
    public function borrarAction(Partido $partido)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $em->remove($partido);

        try {
            $em->flush();
            $this->addFlash('exito', 'Partido eliminado con éxito');
        }
        catch (\Exception $e) {
            $this->addFlash('error', 'No se ha podido eliminar el partido');
        }
        return $this->redirectToRoute('partido_listar');
    }
}
