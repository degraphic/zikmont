<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\DoctrineBundle\DoctrineBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),            
            new zikmont\FrontEndBundle\zikmontFrontEndBundle(),
            new Yepsua\SmarTwigBundle\YepsuaSmarTwigBundle(),
            new zikmont\ContabilidadBundle\zikmontContabilidadBundle(),
            new zikmont\ImpresionesBundle\zikmontImpresionesBundle(),
            new zikmont\MensajesBundle\zikmontMensajesBundle(),
            new zikmont\GestionCarteraBundle\zikmontGestionCarteraBundle(),
            new zikmont\GestionDocumentalBundle\zikmontGestionDocumentalBundle(),
            new zikmont\TransporteBundle\zikmontTransporteBundle(),
            new zikmont\ExternasBundle\zikmontExternasBundle(),
            new zikmont\SeguridadBundle\zikmontSeguridadBundle(),
            new zikmont\InventarioBundle\zikmontInventarioBundle(),
            new zikmont\CarteraBundle\zikmontCarteraBundle(),
            new zikmont\TesoreriaBundle\zikmontTesoreriaBundle(),
            new zikmont\PresupuestosCivilesBundle\zikmontPresupuestosCivilesBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Acme\DemoBundle\AcmeDemoBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
