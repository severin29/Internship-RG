<?php

namespace ContainerDSjuuYU;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getStimulus_AssetMapper_AutoImportLocatorService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'stimulus.asset_mapper.auto_import_locator' shared service.
     *
     * @return \Symfony\UX\StimulusBundle\AssetMapper\AutoImportLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/stimulus-bundle/src/AssetMapper/AutoImportLocator.php';

        $a = ($container->privates['asset_mapper'] ?? self::getAssetMapperService($container));

        if (isset($container->privates['stimulus.asset_mapper.auto_import_locator'])) {
            return $container->privates['stimulus.asset_mapper.auto_import_locator'];
        }

        return $container->privates['stimulus.asset_mapper.auto_import_locator'] = new \Symfony\UX\StimulusBundle\AssetMapper\AutoImportLocator(($container->privates['asset_mapper.importmap.config_reader'] ?? $container->load('getAssetMapper_Importmap_ConfigReaderService')), $a);
    }
}
