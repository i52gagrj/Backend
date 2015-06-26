<?php

namespace i52gagrj\LaTejedora\TPVFrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Venta
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="i52gagrj\LaTejedora\TPVFrontendBundle\Entity\VentaRepository")
 */
class Venta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaventa", type="date")
     */
    private $fechaventa;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horaventa", type="time")
     */
    private $horaventa;

    /**
     * @var boolean
     *
     * @ORM\Column(name="contado", type="boolean")
     */
    private $contado;

    // ASOCIACIONES //

    /**
     * @ORM\ManyToOne(targetEntity="Usuario")
     */
    private $usuario;

    /**
     * @ORM\ManyToOne(targetEntity="Socio")
     */
    private $socio;

    /**
     * @ORM\OneToMany(targetEntity="Lineaventa", mappedBy="venta")
     */
    private $lineaventas;

    public function __construct()
    {
        $this->lineaventas = new ArrayCollection();
    }

    // FIN ASOCIACIONES // 


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
     * Set fechaventa
     *
     * @param \DateTime $fechaventa
     * @return Venta
     */
    public function setFechaventa($fechaventa)
    {
        $this->fechaventa = $fechaventa;

        return $this;
    }

    /**
     * Get fechaventa
     *
     * @return \DateTime 
     */
    public function getFechaventa()
    {
        return $this->fechaventa;
    }

    /**
     * Set horaventa
     *
     * @param \DateTime $horaventa
     * @return Venta
     */
    public function setHoraventa($horaventa)
    {
        $this->horaventa = $horaventa;

        return $this;
    }

    /**
     * Get horaventa
     *
     * @return \DateTime 
     */
    public function getHoraventa()
    {
        return $this->horaventa;
    }

    /**
     * Set contado
     *
     * @param boolean $contado
     * @return Venta
     */
    public function setContado($contado)
    {
        $this->contado = $contado;

        return $this;
    }

    /**
     * Get contado
     *
     * @return boolean 
     */
    public function getContado()
    {
        return $this->contado;
    }

    /**
     * Set usuario
     *
     * @param \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Usuario $usuario
     * @return Venta
     */
    public function setUsuario(\i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set socio
     *
     * @param \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Socio $socio
     * @return Venta
     */
    public function setSocio(\i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Socio $socio = null)
    {
        $this->socio = $socio;

        return $this;
    }

    /**
     * Get socio
     *
     * @return \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Socio 
     */
    public function getSocio()
    {
        return $this->socio;
    }

    /**
     * Add lineaventas
     *
     * @param \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Lineaventa $lineaventas
     * @return Venta
     */
    public function addLineaventa(\i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Lineaventa $lineaventas)
    {
        $this->lineaventas[] = $lineaventas;

        return $this;
    }

    /**
     * Remove lineaventas
     *
     * @param \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Lineaventa $lineaventas
     */
    public function removeLineaventa(\i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Lineaventa $lineaventas)
    {
        $this->lineaventas->removeElement($lineaventas);
    }

    /**
     * Get lineaventas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLineaventas()
    {
        return $this->lineaventas;
    }
}
