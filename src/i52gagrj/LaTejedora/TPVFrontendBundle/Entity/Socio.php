<?php

namespace i52gagrj\LaTejedora\TPVFrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Socio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="i52gagrj\LaTejedora\TPVFrontendBundle\Entity\SocioRepository")
 */
class Socio
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="poblacion", type="string", length=100)
     */
    private $poblacion;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=5)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="provincia", type="string", length=100)
     */
    private $provincia;

    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=9)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telefijo", type="string", length=9)
     */
    private $telefijo;

    /**
     * @var string
     *
     * @ORM\Column(name="telemovil", type="string", length=9)
     */
    private $telemovil;

    /**
     * @var string
     *
     * @ORM\Column(name="saldo", type="decimal", scale=2)
     */
    private $saldo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean")
     */
    private $activo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechainactivo", type="date")
     */
    private $fechainactivo;


    // ASOCIACIONES //

    /**
     * @ORM\OneToMany(targetEntity="Venta", mappedBy="socio")
     */
    private $ventas;

    public function __construct()
    {
        $this->ventas = new ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Socio
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
     * Set direccion
     *
     * @param string $direccion
     * @return Socio
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set poblacion
     *
     * @param string $poblacion
     * @return Socio
     */
    public function setPoblacion($poblacion)
    {
        $this->poblacion = $poblacion;

        return $this;
    }

    /**
     * Get poblacion
     *
     * @return string 
     */
    public function getPoblacion()
    {
        return $this->poblacion;
    }

    /**
     * Set cp
     *
     * @param string $cp
     * @return Socio
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set provincia
     *
     * @param string $provincia
     * @return Socio
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Get provincia
     *
     * @return string 
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * Set dni
     *
     * @param string $dni
     * @return Socio
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string 
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Socio
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telefijo
     *
     * @param string $telefijo
     * @return Socio
     */
    public function setTelefijo($telefijo)
    {
        $this->telefijo = $telefijo;

        return $this;
    }

    /**
     * Get telefijo
     *
     * @return string 
     */
    public function getTelefijo()
    {
        return $this->telefijo;
    }

    /**
     * Set telemovil
     *
     * @param string $telemovil
     * @return Socio
     */
    public function setTelemovil($telemovil)
    {
        $this->telemovil = $telemovil;

        return $this;
    }

    /**
     * Get telemovil
     *
     * @return string 
     */
    public function getTelemovil()
    {
        return $this->telemovil;
    }

    /**
     * Set saldo
     *
     * @param string $saldo
     * @return Socio
     */
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;

        return $this;
    }

    /**
     * Get saldo
     *
     * @return string 
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return Socio
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean 
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set fechainactivo
     *
     * @param \DateTime $fechainactivo
     * @return Socio
     */
    public function setFechainactivo($fechainactivo)
    {
        $this->fechainactivo = $fechainactivo;

        return $this;
    }

    /**
     * Get fechainactivo
     *
     * @return \DateTime 
     */
    public function getFechainactivo()
    {
        return $this->fechainactivo;
    }

    /**
     * Add ventas
     *
     * @param \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Venta $ventas
     * @return Socio
     */
    public function addVenta(\i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Venta $ventas)
    {
        $this->ventas[] = $ventas;

        return $this;
    }

    /**
     * Remove ventas
     *
     * @param \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Venta $ventas
     */
    public function removeVenta(\i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Venta $ventas)
    {
        $this->ventas->removeElement($ventas);
    }

    /**
     * Get ventas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVentas()
    {
        return $this->ventas;
    }
}
