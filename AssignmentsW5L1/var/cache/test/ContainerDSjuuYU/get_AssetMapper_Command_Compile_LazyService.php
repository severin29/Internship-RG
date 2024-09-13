<?php

namespace ContainerDSjuuYU;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_AssetMapper_Command_Compile_LazyService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private '.asset_mapper.command.compile.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/LazyCommand.php';

        return $container->privates['.asset_mapper.command.compile.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('asset-map:compile', [], 'Compile all mapped assets and writes them to the final public output directory', false, #[\Closure(name: 'asset_mapper.command.compile', class: 'Symfony\\Component\\AssetMapper\\Command\\AssetMapperCompileCommand')] fn (): \Symfony\Component\AssetMapper\Command\AssetMapperCompileCommand => ($container->privates['asset_mapper.command.compile'] ?? $container->load('getAssetMapper_Command_CompileService')));
    }
}
