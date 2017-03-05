<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Jugador
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
    private $edad;

    /**
     * @ORM\ManyToOne(targetEntity="Equipo", inversedBy="plantilla")
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
     * @return Jugador
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
     * @return Jugador
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
     * @param integer $edad
     * @return Jugador
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get edad
     *
     * @return integer 
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set equipo
     *
     * @param Equipo $equipo
     * @return Jugador
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
}
