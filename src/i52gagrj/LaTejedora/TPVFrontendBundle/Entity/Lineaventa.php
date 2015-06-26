<?php

namespace i52gagrj\LaTejedora\TPVFrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Lineaventa
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="i52gagrj\LaTejedora\TPVFrontendBundle\Entity\LineaventaRepository")
 */
class Lineaventa
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
     * @ORM\Column(name="precio", type="decimal", scale=2)
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="iva", type="integer")
     */
    private $iva;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;


    // ASOCIACIONES //

    /**
     * @ORM\ManyToOne(targetEntity="Venta")
     */
    private $venta;

    /**
     * @ORM\ManyToOne(targetEntity="Producto")
     */
    private $producto;

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
     * Set precio
     *
     * @param string $precio
     * @return Lineaventa
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
     * @param string $iva
     * @return Lineaventa
     */
    public function setIva($iva)
    {
        $this->iva = $iva;

        return $this;
    }

    /**
     * Get iva
     *
     * @return string 
     */
    public function getIva()
    {
        return $this->iva;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return Lineaventa
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set venta
     *
     * @param \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Venta $venta
     * @return Lineaventa
     */
    public function setVenta(\i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Venta $venta = null)
    {
        $this->venta = $venta;

        return $this;
    }

    /**
     * Get venta
     *
     * @return \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Venta 
     */
    public function getVenta()
    {
        return $this->venta;
    }

    /**
     * Set producto
     *
     * @param \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Producto $producto
     * @return Lineaventa
     */
    public function setProducto(\i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Producto $producto = null)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Producto 
     */
    public function getProducto()
    {
        return $this->producto;
    }
}
