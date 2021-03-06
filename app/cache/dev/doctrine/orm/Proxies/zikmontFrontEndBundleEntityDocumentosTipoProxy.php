<?php

namespace Proxies;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class zikmontFrontEndBundleEntityDocumentosTipoProxy extends \zikmont\FrontEndBundle\Entity\DocumentosTipo implements \Doctrine\ORM\Proxy\Proxy
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
    
    
    public function getCodigoDocumentoTipoPk()
    {
        $this->__load();
        return parent::getCodigoDocumentoTipoPk();
    }

    public function setNombreDocumentoTipo($nombreDocumentoTipo)
    {
        $this->__load();
        return parent::setNombreDocumentoTipo($nombreDocumentoTipo);
    }

    public function getNombreDocumentoTipo()
    {
        $this->__load();
        return parent::getNombreDocumentoTipo();
    }

    public function addDocumentos(\zikmont\FrontEndBundle\Entity\Documentos $documentos)
    {
        $this->__load();
        return parent::addDocumentos($documentos);
    }

    public function getDocumentos()
    {
        $this->__load();
        return parent::getDocumentos();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'codigoDocumentoTipoPk', 'nombreDocumentoTipo', 'documentos');
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