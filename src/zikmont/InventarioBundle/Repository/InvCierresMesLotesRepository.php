<?php

namespace zikmont\InventarioBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * InvCierresMesLotesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class InvCierresMesLotesRepository extends EntityRepository
{
    public function AsigarDatosLotesCierreALotes ($intCodigoCierreMes, $intCodigoItem) {
        $em = $this->getEntityManager();
        $arCierreMesLotes = new \zikmont\InventarioBundle\Entity\InvCierresMesLotes();
        $arCierreMesLotes = $em->getRepository('zikmontInventarioBundle:InvCierresMesLotes')->findBy(array('codigoCierreMesFk' => $intCodigoCierreMes, 'codigoItemFk' => $intCodigoItem));
        foreach ($arCierreMesLotes as $arCierreMesLotes) {
            $arLoteAct = new \zikmont\InventarioBundle\Entity\InvLotes();
            $arLoteAct = $em->getRepository('zikmontInventarioBundle:InvLotes')->find(array('codigoItemFk' => $arCierreMesLotes->getCodigoItemFk(), 'codigoBodegaFk' => $arCierreMesLotes->getCodigoBodegaFk(), 'loteFk' => $arCierreMesLotes->getLoteFk()));                            
            if(count($arLoteAct) > 0) {
                $arLoteAct->setExistencia($arCierreMesLotes->getExistencia());
            }
            $em->persist($arLoteAct);
            $em->flush();
        }        
    }
}