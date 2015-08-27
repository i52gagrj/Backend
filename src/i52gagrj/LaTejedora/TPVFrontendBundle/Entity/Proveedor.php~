<?php

namespace i52gagrj\LaTejedora\TPVFrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Proveedor
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="i52gagrj\LaTejedora\TPVFrontendBundle\Entity\ProveedorRepository")
 */
class Proveedor
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
     * @ORM\Column(name="nif", type="string", length=9)
     */
    private $nif;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="poblacion", type="string", length=255)
     */
    private $poblacion;

    /**
     * @var string
     *
     * @ORM\Column(name="provincia", type="string", length=100)
     */
    private $provincia;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=9)
     */
    private $cp;

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
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean")
     */
    private $activo;


    // ASOCIACIONES //

    /**
     * @ORM\OneToMany(targetEntity="Producto", mappedBy="proveedor")
     */
    private $productos;

    public function __construct()
    {
        $this->productos = new ArrayCollection();
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
     * @return Proveedor
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
     * Set nif
     *
     * @param string $nif
     * @return Proveedor
     */
    public function setNif($nif)
    {
        $this->nif = $nif;

        return $this;
    }

    /**
     * Get nif
     *
     * @return string 
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Proveedor
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
     * @return Proveedor
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
     * Set provincia
     *
     * @param string $provincia
     * @return Proveedor
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
     * Set cp
     *
     * @param string $cp
     * @return Proveedor
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
     * Set telefijo
     *
     * @param string $telefijo
     * @return Proveedor
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
     * @return Proveedor
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
     * Set email
     *
     * @param string $email
     * @return Proveedor
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
     * Set activo
     *
     * @param boolean $activo
     * @return Proveedor
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
     * Add productos
     *
     * @param \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Producto $productos
     * @return Proveedor
     */
    public function addProducto(\i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Producto $productos)
    {
        $this->productos[] = $productos;

        return $this;
    }

    /**
     * Remove productos
     *
     * @param \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Producto $productos
     */
    public function removeProducto(\i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Producto $productos)
    {
        $this->productos->removeElement($productos);
    }

    /**
     * Get productos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductos()
    {
        return $this->productos;
    }
}
