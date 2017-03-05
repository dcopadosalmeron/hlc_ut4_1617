<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Equipo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $denominacion;

    /**
     * @ORM\OneToMany(targetEntity="Jugador", mappedBy="equipo")
     * @var ArrayCollection
     */
    private $plantilla;

    /**
     * @ORM\OneToOne(targetEntity="Entrenador", mappedBy="equipo")
     * @var Entrenador
     */
    private $entrenador;

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
     * Set denominacion
     *
     * @param string $denominacion
     * @return Equipo
     */
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;

        return $this;
    }

    /**
     * Get denominacion
     *
     * @return string 
     */
    public function getDenominacion()
    {
        return $this->denominacion;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jugadores = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set entrenador
     *
     * @param Entrenador $entrenador
     * @return Equipo
     */
    public function setEntrenador(Entrenador $entrenador = null)
    {
        $this->entrenador = $entrenador;

        return $this;
    }

    /**
     * Get entrenador
     *
     * @return Entrenador
     */
    public function getEntrenador()
    {
        return $this->entrenador;
    }

    /**
     * Add plantilla
     *
     * @param \AppBundle\Entity\Jugador $plantilla
     * @return Equipo
     */
    public function addPlantilla(\AppBundle\Entity\Jugador $plantilla)
    {
        $this->plantilla[] = $plantilla;

        return $this;
    }

    /**
     * Remove plantilla
     *
     * @param \AppBundle\Entity\Jugador $plantilla
     */
    public function removePlantilla(\AppBundle\Entity\Jugador $plantilla)
    {
        $this->plantilla->removeElement($plantilla);
    }

    /**
     * Get plantilla
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlantilla()
    {
        return $this->plantilla;
    }

    public function __toString()
    {
        return $this->getDenominacion();
    }

}
