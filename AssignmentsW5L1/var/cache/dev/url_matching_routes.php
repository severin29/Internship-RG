<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/api/categories/list' => [[['_route' => 'api_categoryget_all_categories', '_controller' => 'App\\Controller\\CategoryController::getAllCategories'], null, ['GET' => 0], null, true, false, null]],
        '/api/categories' => [[['_route' => 'api_categorycreate_category', '_controller' => 'App\\Controller\\CategoryController::createCategory'], null, ['POST' => 0], null, true, false, null]],
        '/api/customers/list' => [[['_route' => 'api_customerget_all_customers', '_controller' => 'App\\Controller\\CustomerController::getAllCategories'], null, ['GET' => 0], null, false, false, null]],
        '/api/customers/create' => [[['_route' => 'api_customercreate_customer', '_controller' => 'App\\Controller\\CustomerController::createCustomer'], null, ['POST' => 0], null, false, false, null]],
        '/api/orders/list' => [[['_route' => 'api_ordersget_all_orders', '_controller' => 'App\\Controller\\OrderController::getAllOrders'], null, ['GET' => 0], null, false, false, null]],
        '/api/orders/create' => [[['_route' => 'api_orderscreate_order', '_controller' => 'App\\Controller\\OrderController::createOrder'], null, ['POST' => 0], null, false, false, null]],
        '/api/products/list' => [[['_route' => 'api_productsget_all_products', '_controller' => 'App\\Controller\\ProductController::getAllProducts'], null, ['GET' => 0], null, false, false, null]],
        '/api/products' => [[['_route' => 'api_productscreate_product', '_controller' => 'App\\Controller\\ProductController::createProduct'], null, ['POST' => 0], null, true, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/api/(?'
                    .'|c(?'
                        .'|ategories/(?'
                            .'|list/([^/]++)(*:240)'
                            .'|edit/([^/]++)(*:261)'
                            .'|delete/([^/]++)(*:284)'
                            .'|showcategory/([^/]++)(*:313)'
                        .')'
                        .'|ustomers/(?'
                            .'|list/([^/]++)(*:347)'
                            .'|edit/([^/]++)(*:368)'
                            .'|delete/([^/]++)(*:391)'
                        .')'
                    .')'
                    .'|orders/(?'
                        .'|list/([^/]++)(*:424)'
                        .'|edit/([^/]++)(*:445)'
                        .'|delete/([^/]++)(*:468)'
                    .')'
                    .'|products/(?'
                        .'|list/([^/]++)(*:502)'
                        .'|edit/([^/]++)(*:523)'
                        .'|delete/([^/]++)(*:546)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        240 => [[['_route' => 'api_categoryget_category', '_controller' => 'App\\Controller\\CategoryController::getCategory'], ['id'], ['GET' => 0], null, false, true, null]],
        261 => [[['_route' => 'api_categoryupdate_category', '_controller' => 'App\\Controller\\CategoryController::updateCategory'], ['id'], ['PUT' => 0], null, false, true, null]],
        284 => [[['_route' => 'api_categorydelete_category', '_controller' => 'App\\Controller\\CategoryController::deleteCategory'], ['id'], ['DELETE' => 0], null, false, true, null]],
        313 => [[['_route' => 'api_categoryapp_category', '_controller' => 'App\\Controller\\CategoryController::index'], ['name'], null, null, false, true, null]],
        347 => [[['_route' => 'api_customerget_customer', '_controller' => 'App\\Controller\\CustomerController::getCustomer'], ['id'], ['GET' => 0], null, false, true, null]],
        368 => [[['_route' => 'api_customerupdate_customer', '_controller' => 'App\\Controller\\CustomerController::updateCustomer'], ['id'], ['PUT' => 0], null, false, true, null]],
        391 => [[['_route' => 'api_customerdelete_customer', '_controller' => 'App\\Controller\\CustomerController::deleteCustomer'], ['id'], ['DELETE' => 0], null, false, true, null]],
        424 => [[['_route' => 'api_ordersget_order', '_controller' => 'App\\Controller\\OrderController::getOrder'], ['id'], ['GET' => 0], null, false, true, null]],
        445 => [[['_route' => 'api_ordersupdate_order', '_controller' => 'App\\Controller\\OrderController::updateCategory'], ['id'], ['PUT' => 0], null, false, true, null]],
        468 => [[['_route' => 'api_ordersdelete_order', '_controller' => 'App\\Controller\\OrderController::deleteOrder'], ['id'], ['DELETE' => 0], null, false, true, null]],
        502 => [[['_route' => 'api_productsget_product', '_controller' => 'App\\Controller\\ProductController::getProduct'], ['id'], ['GET' => 0], null, false, true, null]],
        523 => [[['_route' => 'api_productsupdate_product', '_controller' => 'App\\Controller\\ProductController::updateProduct'], ['id'], ['PUT' => 0], null, false, true, null]],
        546 => [
            [['_route' => 'api_productsdelete_product', '_controller' => 'App\\Controller\\ProductController::deleteProduct'], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
