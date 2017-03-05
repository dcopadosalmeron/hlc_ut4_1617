<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Partido
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Equipo")
     * @ORM\JoinColumn(nullable=false)
     * @var Equipo
     */
    private $equipoLocal;

    /**
     * @ORM\ManyToOne(targetEntity="Equipo")
     * @ORM\JoinColumn(nullable=false)
     * @var Equipo
     */
    private $equipoVisitante;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $marcadorLocal;
    
    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $marcadorVisitante;

    /**
     * @ORM\Column(type="date")
     * @var \DateTime
     */
    private $fechaCelebracion;


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
     * Set marcadorLocal
     *
     * @param integer $marcadorLocal
     * @return Partido
     */
    public function setMarcadorLocal($marcadorLocal)
    {
        $this->marcadorLocal = $marcadorLocal;

        return $this;
    }

    /**
     * Get marcadorLocal
     *
     * @return integer 
     */
    public function getMarcadorLocal()
    {
        return $this->marcadorLocal;
    }

    /**
     * Set marcadorVisitante
     *
     * @param integer $marcadorVisitante
     * @return Partido
     */
    public function setMarcadorVisitante($marcadorVisitante)
    {
        $this->marcadorVisitante = $marcadorVisitante;

        return $this;
    }

    /**
     * Get marcadorVisitante
     *
     * @return integer 
     */
    public function getMarcadorVisitante()
    {
        return $this->marcadorVisitante;
    }

    /**
     * Set equipoLocal
     *
     * @param Equipo $equipoLocal
     * @return Partido
     */
    public function setEquipoLocal(Equipo $equipoLocal)
    {
        $this->equipoLocal = $equipoLocal;

        return $this;
    }

    /**
     * Get equipoLocal
     *
     * @return Equipo
     */
    public function getEquipoLocal()
    {
        return $this->equipoLocal;
    }

    /**
     * Set equipoVisitante
     *
     * @param Equipo $equipoVisitante
     * @return Partido
     */
    public function setEquipoVisitante(Equipo $equipoVisitante)
    {
        $this->equipoVisitante = $equipoVisitante;

        return $this;
    }

    /**
     * Get equipoVisitante
     *
     * @return Equipo
     */
    public function getEquipoVisitante()
    {
        return $this->equipoVisitante;
    }

    /**
     * Set fechaCelebracion
     *
     * @param \DateTime $fechaCelebracion
     * @return Partido
     */
    public function setFechaCelebracion($fechaCelebracion)
    {
        $this->fechaCelebracion = $fechaCelebracion;

        return $this;
    }

    /**
     * Get fechaCelebracion
     *
     * @return \DateTime 
     */
    public function getFechaCelebracion()
    {
        return $this->fechaCelebracion;
    }
}
