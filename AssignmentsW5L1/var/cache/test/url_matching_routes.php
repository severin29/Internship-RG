<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/categories' => [
            [['_route' => 'api_categoryget_all_categories', '_controller' => 'App\\Controller\\CategoryController::getAllCategories'], null, ['GET' => 0], null, true, false, null],
            [['_route' => 'api_categorycreate_category', '_controller' => 'App\\Controller\\CategoryController::createCategory'], null, ['POST' => 0], null, true, false, null],
        ],
        '/api/customers' => [
            [['_route' => 'api_customerget_all_customers', '_controller' => 'App\\Controller\\CustomerController::getAllCategories'], null, ['GET' => 0], null, true, false, null],
            [['_route' => 'api_customercreate_customer', '_controller' => 'App\\Controller\\CustomerController::createCustomer'], null, ['POST' => 0], null, true, false, null],
        ],
        '/api/orders' => [
            [['_route' => 'api_ordersget_all_orders', '_controller' => 'App\\Controller\\OrderController::getAllOrders'], null, ['GET' => 0], null, true, false, null],
            [['_route' => 'api_orderscreate_order', '_controller' => 'App\\Controller\\OrderController::createOrder'], null, ['POST' => 0], null, true, false, null],
        ],
        '/api/products' => [
            [['_route' => 'api_productsget_all_products', '_controller' => 'App\\Controller\\ProductController::getAllProducts'], null, ['GET' => 0], null, true, false, null],
            [['_route' => 'api_productscreate_product', '_controller' => 'App\\Controller\\ProductController::createProduct'], null, ['POST' => 0], null, true, false, null],
        ],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api/(?'
                    .'|c(?'
                        .'|ategories/([^/]++)(?'
                            .'|(*:40)'
                        .')'
                        .'|ustomers/([^/]++)(?'
                            .'|(*:68)'
                        .')'
                    .')'
                    .'|orders/([^/]++)(?'
                        .'|(*:95)'
                    .')'
                    .'|products/([^/]++)(?'
                        .'|(*:123)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        40 => [
            [['_route' => 'api_categoryget_category', '_controller' => 'App\\Controller\\CategoryController::getCategory'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_categoryupdate_category', '_controller' => 'App\\Controller\\CategoryController::updateCategory'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_categorydelete_category', '_controller' => 'App\\Controller\\CategoryController::deleteCategory'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        68 => [
            [['_route' => 'api_customerget_customer', '_controller' => 'App\\Controller\\CustomerController::getCustomer'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_customerupdate_customer', '_controller' => 'App\\Controller\\CustomerController::updateCustomer'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_customerdelete_customer', '_controller' => 'App\\Controller\\CustomerController::deleteCustomer'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        95 => [
            [['_route' => 'api_ordersget_order', '_controller' => 'App\\Controller\\OrderController::getOrder'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_ordersupdate_order', '_controller' => 'App\\Controller\\OrderController::updateCategory'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_ordersdelete_order', '_controller' => 'App\\Controller\\OrderController::deleteOrder'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        123 => [
            [['_route' => 'api_productsget_product', '_controller' => 'App\\Controller\\ProductController::getProduct'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_productsupdate_product', '_controller' => 'App\\Controller\\ProductController::updateProduct'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_productsdelete_product', '_controller' => 'App\\Controller\\ProductController::deleteProduct'], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
