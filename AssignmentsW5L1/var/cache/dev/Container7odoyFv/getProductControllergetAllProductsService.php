<?php

namespace Container7odoyFv;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getProductControllergetAllProductsService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.IQaGfXu.App\Controller\ProductController::getAllProducts()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.IQaGfXu.App\\Controller\\ProductController::getAllProducts()'] = ($container->privates['.service_locator.IQaGfXu'] ?? $container->load('get_ServiceLocator_IQaGfXuService'))->withContext('App\\Controller\\ProductController::getAllProducts()', $container);
    }
}
