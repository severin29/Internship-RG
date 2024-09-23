<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], [], []],
    '_profiler_xdebug' => [[], ['_controller' => 'web_profiler.controller.profiler::xdebugAction'], [], [['text', '/_profiler/xdebug']], [], [], []],
    '_profiler_font' => [['fontName'], ['_controller' => 'web_profiler.controller.profiler::fontAction'], [], [['text', '.woff2'], ['variable', '/', '[^/\\.]++', 'fontName', true], ['text', '/_profiler/font']], [], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    'api_categoryget_all_categories' => [[], ['_controller' => 'App\\Controller\\CategoryController::getAllCategories'], [], [['text', '/api/categories/list/']], [], [], []],
    'api_categoryget_category' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::getCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/categories/list']], [], [], []],
    'api_categorycreate_category' => [[], ['_controller' => 'App\\Controller\\CategoryController::createCategory'], [], [['text', '/api/categories/']], [], [], []],
    'api_categoryupdate_category' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::updateCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/categories/edit']], [], [], []],
    'api_categorydelete_category' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::deleteCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/categories/delete']], [], [], []],
    'api_categoryapp_category' => [['name'], ['_controller' => 'App\\Controller\\CategoryController::index'], [], [['variable', '/', '[^/]++', 'name', true], ['text', '/api/categories/showcategory']], [], [], []],
    'api_customerget_all_customers' => [[], ['_controller' => 'App\\Controller\\CustomerController::getAllCategories'], [], [['text', '/api/customers/list']], [], [], []],
    'api_customerget_customer' => [['id'], ['_controller' => 'App\\Controller\\CustomerController::getCustomer'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/customers/list']], [], [], []],
    'api_customercreate_customer' => [[], ['_controller' => 'App\\Controller\\CustomerController::createCustomer'], [], [['text', '/api/customers/create']], [], [], []],
    'api_customerupdate_customer' => [['id'], ['_controller' => 'App\\Controller\\CustomerController::updateCustomer'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/customers/edit']], [], [], []],
    'api_customerdelete_customer' => [['id'], ['_controller' => 'App\\Controller\\CustomerController::deleteCustomer'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/customers/delete']], [], [], []],
    'api_ordersget_all_orders' => [[], ['_controller' => 'App\\Controller\\OrderController::getAllOrders'], [], [['text', '/api/orders/list']], [], [], []],
    'api_ordersget_order' => [['id'], ['_controller' => 'App\\Controller\\OrderController::getOrder'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/orders/list']], [], [], []],
    'api_orderscreate_order' => [[], ['_controller' => 'App\\Controller\\OrderController::createOrder'], [], [['text', '/api/orders/create']], [], [], []],
    'api_ordersupdate_order' => [['id'], ['_controller' => 'App\\Controller\\OrderController::updateCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/orders/edit']], [], [], []],
    'api_ordersdelete_order' => [['id'], ['_controller' => 'App\\Controller\\OrderController::deleteOrder'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/orders/delete']], [], [], []],
    'api_productsget_all_products' => [[], ['_controller' => 'App\\Controller\\ProductController::getAllProducts'], [], [['text', '/api/products/list']], [], [], []],
    'api_productsget_product' => [['id'], ['_controller' => 'App\\Controller\\ProductController::getProduct'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/products/list']], [], [], []],
    'api_productscreate_product' => [[], ['_controller' => 'App\\Controller\\ProductController::createProduct'], [], [['text', '/api/products/']], [], [], []],
    'api_productsupdate_product' => [['id'], ['_controller' => 'App\\Controller\\ProductController::updateProduct'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/products/edit']], [], [], []],
    'api_productsdelete_product' => [['id'], ['_controller' => 'App\\Controller\\ProductController::deleteProduct'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/products/delete']], [], [], []],
    'App\Controller\CategoryController::getAllCategories' => [[], ['_controller' => 'App\\Controller\\CategoryController::getAllCategories'], [], [['text', '/api/categories/list/']], [], [], []],
    'App\Controller\CategoryController::getCategory' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::getCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/categories/list']], [], [], []],
    'App\Controller\CategoryController::createCategory' => [[], ['_controller' => 'App\\Controller\\CategoryController::createCategory'], [], [['text', '/api/categories/']], [], [], []],
    'App\Controller\CategoryController::updateCategory' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::updateCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/categories/edit']], [], [], []],
    'App\Controller\CategoryController::deleteCategory' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::deleteCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/categories/delete']], [], [], []],
    'App\Controller\CategoryController::index' => [['name'], ['_controller' => 'App\\Controller\\CategoryController::index'], [], [['variable', '/', '[^/]++', 'name', true], ['text', '/api/categories/showcategory']], [], [], []],
    'App\Controller\CustomerController::getAllCategories' => [[], ['_controller' => 'App\\Controller\\CustomerController::getAllCategories'], [], [['text', '/api/customers/list']], [], [], []],
    'App\Controller\CustomerController::getCustomer' => [['id'], ['_controller' => 'App\\Controller\\CustomerController::getCustomer'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/customers/list']], [], [], []],
    'App\Controller\CustomerController::createCustomer' => [[], ['_controller' => 'App\\Controller\\CustomerController::createCustomer'], [], [['text', '/api/customers/create']], [], [], []],
    'App\Controller\CustomerController::updateCustomer' => [['id'], ['_controller' => 'App\\Controller\\CustomerController::updateCustomer'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/customers/edit']], [], [], []],
    'App\Controller\CustomerController::deleteCustomer' => [['id'], ['_controller' => 'App\\Controller\\CustomerController::deleteCustomer'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/customers/delete']], [], [], []],
    'App\Controller\OrderController::getAllOrders' => [[], ['_controller' => 'App\\Controller\\OrderController::getAllOrders'], [], [['text', '/api/orders/list']], [], [], []],
    'App\Controller\OrderController::getOrder' => [['id'], ['_controller' => 'App\\Controller\\OrderController::getOrder'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/orders/list']], [], [], []],
    'App\Controller\OrderController::createOrder' => [[], ['_controller' => 'App\\Controller\\OrderController::createOrder'], [], [['text', '/api/orders/create']], [], [], []],
    'App\Controller\OrderController::updateCategory' => [['id'], ['_controller' => 'App\\Controller\\OrderController::updateCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/orders/edit']], [], [], []],
    'App\Controller\OrderController::deleteOrder' => [['id'], ['_controller' => 'App\\Controller\\OrderController::deleteOrder'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/orders/delete']], [], [], []],
    'App\Controller\ProductController::getAllProducts' => [[], ['_controller' => 'App\\Controller\\ProductController::getAllProducts'], [], [['text', '/api/products/list']], [], [], []],
    'App\Controller\ProductController::getProduct' => [['id'], ['_controller' => 'App\\Controller\\ProductController::getProduct'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/products/list']], [], [], []],
    'App\Controller\ProductController::createProduct' => [[], ['_controller' => 'App\\Controller\\ProductController::createProduct'], [], [['text', '/api/products/']], [], [], []],
    'App\Controller\ProductController::updateProduct' => [['id'], ['_controller' => 'App\\Controller\\ProductController::updateProduct'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/products/edit']], [], [], []],
    'App\Controller\ProductController::deleteProduct' => [['id'], ['_controller' => 'App\\Controller\\ProductController::deleteProduct'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/products/delete']], [], [], []],
];
