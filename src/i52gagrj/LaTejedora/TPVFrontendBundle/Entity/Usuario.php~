<?php
namespace i52gagrj\LaTejedora\TPVFrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Usuario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="i52gagrj\LaTejedora\TPVFrontendBundle\Entity\UsuarioRepository")
 */
class Usuario implements AdvancedUserInterface
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
     * @ORM\Column(name="dni", type="string", length=9)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255)
     *)
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=8)
     *)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100)
     */
    private $password;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechainactivo", type="date")
     */
    private $fechainactivo;


    // ASOCIACIONES //

    /**
     * @ORM\OneToMany(targetEntity="Venta", mappedBy="usuario")
     */
    private $ventas;

    public function __construct()
    {
        $this->ventas = new ArrayCollection();
        $this->cargos = new ArrayCollection();   
    }

    /**
     * @ORM\ManyToMany(targetEntity="Cargo", inversedBy="usuarios")
     */
    private $cargos;

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
     * @return Usuario
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
     * Set dni
     *
     * @param string $dni
     * @return Usuario
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
     * Set salt
     *
     * @param string $salt
     * @return Usuario
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Usuario
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Usuario
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set fechainactivo
     *
     * @param \DateTime $fechainactivo
     * @return Usuario
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
     * @return Usuario
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

     public function eraseCredentials()
     {

     }

     function equals(UserInterface $user)
     {
         return $user->getUsername() === $this->dni;
     }

     public function getRoles()
     {
         $roles = array();
         foreach ($this->cargos as $g)
         {
             $roles[] = $g->getRol();
         }

         return $roles;
     }

     public function isAccountNonExpired()
     {
         return true;
     }

     public function isAccountNonLocked()
     {
         return true;
     }

     public function isCredentialsNonExpired()
     {
         return true;
     }

     public function isEnabled()
     {
         return $this->getIsActive();
     }

    /**
     * Add cargos
     *
     * @param \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Cargo $cargos
     * @return Usuario
     */
    public function addCargo(\i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Cargo $cargos)
    {
        $this->cargos[] = $cargos;

        return $this;
    }

    /**
     * Remove cargos
     *
     * @param \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Cargo $cargos
     */
    public function removeCargo(\i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Cargo $cargos)
    {
        $this->cargos->removeElement($cargos);
    }

    /**
     * Get cargos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCargos()
    {
        return $this->cargos;
    }
}
