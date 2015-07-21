<?php

namespace i52gagrj\LaTejedora\TPVFrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Producto
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="i52gagrj\LaTejedora\TPVFrontendBundle\Entity\ProductoRepository")
 */
class Producto
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
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=1000)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="precio", type="decimal", scale=2)
     */
    private $precio;

    /**
     * @var integer
     *
     * @ORM\Column(name="iva", type="integer")
     */
    private $iva;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="integer")
     */
    private $stock;

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
     * @ORM\ManyToOne(targetEntity="Proveedor")
     */
    private $proveedor;

    /**
     * @ORM\ManyToOne(targetEntity="Tipo")
     */
    private $tipo;

    /**
     * @ORM\OneToMany(targetEntity="Lineaventa", mappedBy="producto")
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
     * Set nombre
     *
     * @param string $nombre
     * @return Producto
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Producto
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set precio
     *
     * @param string $precio
     * @return Producto
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return string 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set iva
     *
     * @param integer $iva
     * @return Producto
     */
    public function setIva($iva)
    {
        $this->iva = $iva;

        return $this;
    }

    /**
     * Get iva
     *
     * @return integer 
     */
    public function getIva()
    {
        return $this->iva;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     * @return Producto
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return Producto
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
     * @return Producto
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
     * Set proveedor
     *
     * @param \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Proveedor $proveedor
     * @return Producto
     */
    public function setProveedor(\i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Proveedor $proveedor = null)
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    /**
     * Get proveedor
     *
     * @return \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Proveedor 
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }

    /**
     * Set tipo
     *
     * @param \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Tipo $tipo
     * @return Producto
     */
    public function setTipo(\i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Tipo $tipo = null)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get proveedor
     *
     * @return \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Add lineaventas
     *
     * @param \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Lineaventa $lineaventas
     * @return Producto
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
