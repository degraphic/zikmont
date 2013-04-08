<?php

namespace zikmont\InventarioBundle\Form;
 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

 
class MovimientoDetalleNuevoType extends AbstractType{
 
    public function buildForm(FormBuilder $builder, array $options)
    {        
        $builder->add('codigoItemFk', 'text');        
        $builder->add('cantidad', 'text');
        $builder->add('codigoBodegaFk', 'text');        
        
    }
 
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'zikmont\InventarioBundle\Entity\InvMovimientosDetalles',
        );
    }
 
    public function getName()
    {
        return "MovimientoDetalleNuevo";
    }
}
?>
