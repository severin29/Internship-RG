<?php

namespace ContainerA1awzYi;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getProductControllergetProductService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.IQaGfXu.App\Controller\ProductController::getProduct()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.IQaGfXu.App\\Controller\\ProductController::getProduct()'] = ($container->privates['.service_locator.IQaGfXu'] ?? $container->load('get_ServiceLocator_IQaGfXuService'))->withContext('App\\Controller\\ProductController::getProduct()', $container);
    }
}
