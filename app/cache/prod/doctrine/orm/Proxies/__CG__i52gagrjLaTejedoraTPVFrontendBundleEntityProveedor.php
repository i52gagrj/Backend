<?php

namespace Proxies\__CG__\i52gagrj\LaTejedora\TPVFrontendBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Proveedor extends \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Proveedor implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Proveedor' . "\0" . 'id', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Proveedor' . "\0" . 'nombre', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Proveedor' . "\0" . 'nif', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Proveedor' . "\0" . 'direccion', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Proveedor' . "\0" . 'poblacion', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Proveedor' . "\0" . 'provincia', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Proveedor' . "\0" . 'cp', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Proveedor' . "\0" . 'telefijo', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Proveedor' . "\0" . 'telemovil', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Proveedor' . "\0" . 'email', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Proveedor' . "\0" . 'productos');
        }

        return array('__isInitialized__', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Proveedor' . "\0" . 'id', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Proveedor' . "\0" . 'nombre', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Proveedor' . "\0" . 'nif', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Proveedor' . "\0" . 'direccion', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Proveedor' . "\0" . 'poblacion', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Proveedor' . "\0" . 'provincia', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Proveedor' . "\0" . 'cp', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Proveedor' . "\0" . 'telefijo', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Proveedor' . "\0" . 'telemovil', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Proveedor' . "\0" . 'email', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Proveedor' . "\0" . 'productos');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Proveedor $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setNombre($nombre)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNombre', array($nombre));

        return parent::setNombre($nombre);
    }

    /**
     * {@inheritDoc}
     */
    public function getNombre()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNombre', array());

        return parent::getNombre();
    }

    /**
     * {@inheritDoc}
     */
    public function setNif($nif)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNif', array($nif));

        return parent::setNif($nif);
    }

    /**
     * {@inheritDoc}
     */
    public function getNif()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNif', array());

        return parent::getNif();
    }

    /**
     * {@inheritDoc}
     */
    public function setDireccion($direccion)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDireccion', array($direccion));

        return parent::setDireccion($direccion);
    }

    /**
     * {@inheritDoc}
     */
    public function getDireccion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDireccion', array());

        return parent::getDireccion();
    }

    /**
     * {@inheritDoc}
     */
    public function setPoblacion($poblacion)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPoblacion', array($poblacion));

        return parent::setPoblacion($poblacion);
    }

    /**
     * {@inheritDoc}
     */
    public function getPoblacion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPoblacion', array());

        return parent::getPoblacion();
    }

    /**
     * {@inheritDoc}
     */
    public function setProvincia($provincia)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProvincia', array($provincia));

        return parent::setProvincia($provincia);
    }

    /**
     * {@inheritDoc}
     */
    public function getProvincia()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProvincia', array());

        return parent::getProvincia();
    }

    /**
     * {@inheritDoc}
     */
    public function setCp($cp)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCp', array($cp));

        return parent::setCp($cp);
    }

    /**
     * {@inheritDoc}
     */
    public function getCp()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCp', array());

        return parent::getCp();
    }

    /**
     * {@inheritDoc}
     */
    public function setTelefijo($telefijo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTelefijo', array($telefijo));

        return parent::setTelefijo($telefijo);
    }

    /**
     * {@inheritDoc}
     */
    public function getTelefijo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTelefijo', array());

        return parent::getTelefijo();
    }

    /**
     * {@inheritDoc}
     */
    public function setTelemovil($telemovil)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTelemovil', array($telemovil));

        return parent::setTelemovil($telemovil);
    }

    /**
     * {@inheritDoc}
     */
    public function getTelemovil()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTelemovil', array());

        return parent::getTelemovil();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', array($email));

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', array());

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function addProducto(\i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Producto $productos)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addProducto', array($productos));

        return parent::addProducto($productos);
    }

    /**
     * {@inheritDoc}
     */
    public function removeProducto(\i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Producto $productos)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeProducto', array($productos));

        return parent::removeProducto($productos);
    }

    /**
     * {@inheritDoc}
     */
    public function getProductos()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductos', array());

        return parent::getProductos();
    }

}
