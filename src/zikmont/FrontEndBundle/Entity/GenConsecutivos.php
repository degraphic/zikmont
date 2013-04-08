<?php

namespace zikmont\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="gen_consecutivos")
 * @ORM\Entity(repositoryClass="zikmont\FrontEndBundle\Repository\GenConsecutivosRepository")
 */
class GenConsecutivos
{
    
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_pk", type="smallint")
     * @ORM\GeneratedValue(strategy="AUTO")
     */        
    private $codigoPk;    
    
    /**
     * @ORM\Column(name="asientos", type="integer")
     */
    private $asientos = 0; 


    /**
     * Get codigoPk
     *
     * @return smallint 
     */
    public function getCodigoPk()
    {
        return $this->codigoPk;
    }

    /**
     * Set asientos
     *
     * @param integer $asientos
     */
    public function setAsientos($asientos)
    {
        $this->asientos = $asientos;
    }

    /**
     * Get asientos
     *
     * @return integer 
     */
    public function getAsientos()
    {
        return $this->asientos;
    }
}