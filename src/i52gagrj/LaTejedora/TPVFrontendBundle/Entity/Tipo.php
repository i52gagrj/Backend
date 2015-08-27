<?php

namespace i52gagrj\LaTejedora\TPVFrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Tipo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="i52gagrj\LaTejedora\TPVFrontendBundle\Entity\TipoRepository")
 */
class Tipo
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
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="padre", type="integer")
     */
    private $padre;

    //ASOCIACIONES

    /**
     * @ORM\OneToMany(targetEntity="Producto", mappedBy="tipo")
     */
    private $productos;

    public function __construct()
    {
        $this->productos = new ArrayCollection();
    }

    //FIN ASOCIACIONES


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
     * @return Tipo
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
     * Set padre
     *
     * @param integer $padre
     * @return Tipo
     */
    public function setPadre($padre)
    {
        $this->padre = $padre;

        return $this;
    }

    /**
     * Get padre
     *
     * @return integer 
     */
    public function getPadre()
    {
        return $this->padre;
    }

    /**
     * Add productos
     *
     * @param \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Producto $productos
     * @return Tipo
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
