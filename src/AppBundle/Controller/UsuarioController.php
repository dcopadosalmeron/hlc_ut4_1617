<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsuarioController extends Controller
{
    /**
     * @Route("/conectar", name="usuario_entrar")
     */
    public function loginAction()
    {
        $helper = $this->get('security.authentication_utils');

        return $this->render('usuario/entrar.html.twig',
            [
                'last_username' => $helper->getLastUsername(),
                'error'         => $helper->getLastAuthenticationError()
            ]);

    }

    /**
     * @Route("/comprobar", name="usuario_comprobar")
     * @Route("/desconectar", name="usuario_salir")
     */
    public function operacionesLoginAction()
    {

    }
}
