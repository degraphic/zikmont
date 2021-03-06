<?php

namespace Proxies;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class zikmontFrontEndBundleEntityItemProxy extends \zikmont\FrontEndBundle\Entity\Item implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }
    
    
    public function getCodigoItemPk()
    {
        $this->__load();
        return parent::getCodigoItemPk();
    }

    public function setDescripcion($descripcion)
    {
        $this->__load();
        return parent::setDescripcion($descripcion);
    }

    public function getDescripcion()
    {
        $this->__load();
        return parent::getDescripcion();
    }

    public function setCuentaIngreso($cuentaIngreso)
    {
        $this->__load();
        return parent::setCuentaIngreso($cuentaIngreso);
    }

    public function getCuentaIngreso()
    {
        $this->__load();
        return parent::getCuentaIngreso();
    }

    public function setCuentaDevolucionVentas($cuentaDevolucionVentas)
    {
        $this->__load();
        return parent::setCuentaDevolucionVentas($cuentaDevolucionVentas);
    }

    public function getCuentaDevolucionVentas()
    {
        $this->__load();
        return parent::getCuentaDevolucionVentas();
    }

    public function setCuentaCompras($cuentaCompras)
    {
        $this->__load();
        return parent::setCuentaCompras($cuentaCompras);
    }

    public function getCuentaCompras()
    {
        $this->__load();
        return parent::getCuentaCompras();
    }

    public function setCuentaCosto($cuentaCosto)
    {
        $this->__load();
        return parent::setCuentaCosto($cuentaCosto);
    }

    public function getCuentaCosto()
    {
        $this->__load();
        return parent::getCuentaCosto();
    }

    public function setCuentaInventario($cuentaInventario)
    {
        $this->__load();
        return parent::setCuentaInventario($cuentaInventario);
    }

    public function getCuentaInventario()
    {
        $this->__load();
        return parent::getCuentaInventario();
    }

    public function setPorcentajeIva($porcentajeIva)
    {
        $this->__load();
        return parent::setPorcentajeIva($porcentajeIva);
    }

    public function getPorcentajeIva()
    {
        $this->__load();
        return parent::getPorcentajeIva();
    }

    public function setCantidadExistencia($cantidadExistencia)
    {
        $this->__load();
        return parent::setCantidadExistencia($cantidadExistencia);
    }

    public function getCantidadExistencia()
    {
        $this->__load();
        return parent::getCantidadExistencia();
    }

    public function setCantidadRemisionada($cantidadRemisionada)
    {
        $this->__load();
        return parent::setCantidadRemisionada($cantidadRemisionada);
    }

    public function getCantidadRemisionada()
    {
        $this->__load();
        return parent::getCantidadRemisionada();
    }

    public function setCantidadDisponible($cantidadDisponible)
    {
        $this->__load();
        return parent::setCantidadDisponible($cantidadDisponible);
    }

    public function getCantidadDisponible()
    {
        $this->__load();
        return parent::getCantidadDisponible();
    }

    public function setCuentaDevolucionCompras($cuentaDevolucionCompras)
    {
        $this->__load();
        return parent::setCuentaDevolucionCompras($cuentaDevolucionCompras);
    }

    public function getCuentaDevolucionCompras()
    {
        $this->__load();
        return parent::getCuentaDevolucionCompras();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'codigoItemPk', 'descripcion', 'cuentaIngreso', 'cuentaDevolucionVentas', 'cuentaCompras', 'cuentaDevolucionCompras', 'cuentaCosto', 'cuentaInventario', 'porcentajeIva', 'cantidadExistencia', 'cantidadRemisionada', 'cantidadDisponible');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields AS $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}