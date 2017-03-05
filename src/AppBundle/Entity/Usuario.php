<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Validation;

/**
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Validation\Email()
     * @Validation\NotBlank()
     * @var string
     */
    private $correoElectronico;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $clave;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $administrador;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $arbitro;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $comentarista;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set correoElectronico
     *
     * @param string $correoElectronico
     * @return Usuario
     */
    public function setCorreoElectronico($correoElectronico)
    {
        $this->correoElectronico = $correoElectronico;

        return $this;
    }

    /**
     * Get correoElectronico
     *
     * @return string 
     */
    public function getCorreoElectronico()
    {
        return $this->correoElectronico;
    }

    /**
     * Set clave
     *
     * @param string $clave
     * @return Usuario
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get clave
     *
     * @return string 
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set administrador
     *
     * @param boolean $administrador
     * @return Usuario
     */
    public function setAdministrador($administrador)
    {
        $this->administrador = $administrador;

        return $this;
    }

    /**
     * Get administrador
     *
     * @return boolean 
     */
    public function isAdministrador()
    {
        return $this->administrador;
    }

    /**
     * Set arbitro
     *
     * @param boolean $arbitro
     * @return Usuario
     */
    public function setArbitro($arbitro)
    {
        $this->arbitro = $arbitro;

        return $this;
    }

    /**
     * Get arbitro
     *
     * @return boolean 
     */
    public function isArbitro()
    {
        return $this->arbitro;
    }

    /**
     * Set comentarista
     *
     * @param boolean $comentarista
     * @return Usuario
     */
    public function setComentarista($comentarista)
    {
        $this->comentarista = $comentarista;

        return $this;
    }

    /**
     * Get comentarista
     *
     * @return boolean 
     */
    public function isComentarista()
    {
        return $this->comentarista;
    }
}
