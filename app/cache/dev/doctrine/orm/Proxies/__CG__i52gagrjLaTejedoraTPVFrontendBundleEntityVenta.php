<?php

namespace Proxies\__CG__\i52gagrj\LaTejedora\TPVFrontendBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Venta extends \i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Venta implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Venta' . "\0" . 'id', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Venta' . "\0" . 'fechaventa', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Venta' . "\0" . 'horaventa', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Venta' . "\0" . 'contado', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Venta' . "\0" . 'usuario', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Venta' . "\0" . 'socio', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Venta' . "\0" . 'lineaventas');
        }

        return array('__isInitialized__', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Venta' . "\0" . 'id', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Venta' . "\0" . 'fechaventa', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Venta' . "\0" . 'horaventa', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Venta' . "\0" . 'contado', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Venta' . "\0" . 'usuario', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Venta' . "\0" . 'socio', '' . "\0" . 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Entity\\Venta' . "\0" . 'lineaventas');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Venta $proxy) {
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
    public function setFechaventa($fechaventa)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFechaventa', array($fechaventa));

        return parent::setFechaventa($fechaventa);
    }

    /**
     * {@inheritDoc}
     */
    public function getFechaventa()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFechaventa', array());

        return parent::getFechaventa();
    }

    /**
     * {@inheritDoc}
     */
    public function setHoraventa($horaventa)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHoraventa', array($horaventa));

        return parent::setHoraventa($horaventa);
    }

    /**
     * {@inheritDoc}
     */
    public function getHoraventa()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHoraventa', array());

        return parent::getHoraventa();
    }

    /**
     * {@inheritDoc}
     */
    public function setContado($contado)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContado', array($contado));

        return parent::setContado($contado);
    }

    /**
     * {@inheritDoc}
     */
    public function getContado()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContado', array());

        return parent::getContado();
    }

    /**
     * {@inheritDoc}
     */
    public function setUsuario(\i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Usuario $usuario = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUsuario', array($usuario));

        return parent::setUsuario($usuario);
    }

    /**
     * {@inheritDoc}
     */
    public function getUsuario()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsuario', array());

        return parent::getUsuario();
    }

    /**
     * {@inheritDoc}
     */
    public function setSocio(\i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Socio $socio = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSocio', array($socio));

        return parent::setSocio($socio);
    }

    /**
     * {@inheritDoc}
     */
    public function getSocio()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSocio', array());

        return parent::getSocio();
    }

    /**
     * {@inheritDoc}
     */
    public function addLineaventa(\i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Lineaventa $lineaventas)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addLineaventa', array($lineaventas));

        return parent::addLineaventa($lineaventas);
    }

    /**
     * {@inheritDoc}
     */
    public function removeLineaventa(\i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Lineaventa $lineaventas)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeLineaventa', array($lineaventas));

        return parent::removeLineaventa($lineaventas);
    }

    /**
     * {@inheritDoc}
     */
    public function getLineaventas()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLineaventas', array());

        return parent::getLineaventas();
    }

}
