<?php

namespace zikmont\InventarioBundle\Form;
 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

 
class MovimientoNuevoType extends AbstractType{
 
    public function buildForm(FormBuilder $builder, array $options)
    {        
        $builder->add('codigoTerceroFk', 'text');
        $builder->add('fecha', 'date');
        $builder->add('comentarios', 'textarea');
    }
 
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'zikmont\InventarioBundle\Entity\InvMovimientos',
        );
    }
  
    public function getName()
    {
        return "MovimientoNuevo";
    }
}
?>
