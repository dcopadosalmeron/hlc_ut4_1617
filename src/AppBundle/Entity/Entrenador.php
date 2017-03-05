<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Entrenador
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
     * @var string
     */
    private $nombre;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $apellidos;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $temporadas;

    /**
     * @ORM\OneToOne(targetEntity="Equipo", inversedBy="entrenador")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipo;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Entrenador
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Entrenador
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set edad
     *
     * @param integer $temporadas
     * @return Entrenador
     */
    public function setTemporadas($temporadas)
    {
        $this->temporadas = $temporadas;

        return $this;
    }

    /**
     * Get edad
     *
     * @return integer 
     */
    public function getTemporadas()
    {
        return $this->temporadas;
    }

    /**
     * Set equipo
     *
     * @param Equipo $equipo
     * @return Entrenador
     */
    public function setEquipo(Equipo $equipo)
    {
        $this->equipo = $equipo;

        return $this;
    }

    /**
     * Get equipo
     *
     * @return Equipo
     */
    public function getEquipo()
    {
        return $this->equipo;
    }

    public function __toString()
    {
        return $this->getApellidos() . ', ' . $this->getNombre();
    }
}
