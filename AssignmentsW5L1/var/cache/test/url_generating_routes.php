<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    'api_categoryget_all_categories' => [[], ['_controller' => 'App\\Controller\\CategoryController::getAllCategories'], [], [['text', '/api/categories/']], [], [], []],
    'api_categoryget_category' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::getCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/categories']], [], [], []],
    'api_categorycreate_category' => [[], ['_controller' => 'App\\Controller\\CategoryController::createCategory'], [], [['text', '/api/categories/']], [], [], []],
    'api_categoryupdate_category' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::updateCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/categories']], [], [], []],
    'api_categorydelete_category' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::deleteCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/categories']], [], [], []],
    'api_customerget_all_customers' => [[], ['_controller' => 'App\\Controller\\CustomerController::getAllCategories'], [], [['text', '/api/customers/']], [], [], []],
    'api_customerget_customer' => [['id'], ['_controller' => 'App\\Controller\\CustomerController::getCustomer'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/customers']], [], [], []],
    'api_customercreate_customer' => [[], ['_controller' => 'App\\Controller\\CustomerController::createCustomer'], [], [['text', '/api/customers/']], [], [], []],
    'api_customerupdate_customer' => [['id'], ['_controller' => 'App\\Controller\\CustomerController::updateCustomer'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/customers']], [], [], []],
    'api_customerdelete_customer' => [['id'], ['_controller' => 'App\\Controller\\CustomerController::deleteCustomer'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/customers']], [], [], []],
    'api_ordersget_all_orders' => [[], ['_controller' => 'App\\Controller\\OrderController::getAllOrders'], [], [['text', '/api/orders/']], [], [], []],
    'api_ordersget_order' => [['id'], ['_controller' => 'App\\Controller\\OrderController::getOrder'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/orders']], [], [], []],
    'api_orderscreate_order' => [[], ['_controller' => 'App\\Controller\\OrderController::createOrder'], [], [['text', '/api/orders/']], [], [], []],
    'api_ordersupdate_order' => [['id'], ['_controller' => 'App\\Controller\\OrderController::updateCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/orders']], [], [], []],
    'api_ordersdelete_order' => [['id'], ['_controller' => 'App\\Controller\\OrderController::deleteOrder'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/orders']], [], [], []],
    'api_productsget_all_products' => [[], ['_controller' => 'App\\Controller\\ProductController::getAllProducts'], [], [['text', '/api/products/']], [], [], []],
    'api_productsget_product' => [['id'], ['_controller' => 'App\\Controller\\ProductController::getProduct'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/products']], [], [], []],
    'api_productscreate_product' => [[], ['_controller' => 'App\\Controller\\ProductController::createProduct'], [], [['text', '/api/products/']], [], [], []],
    'api_productsupdate_product' => [['id'], ['_controller' => 'App\\Controller\\ProductController::updateProduct'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/products']], [], [], []],
    'api_productsdelete_product' => [['id'], ['_controller' => 'App\\Controller\\ProductController::deleteProduct'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/products']], [], [], []],
    'App\Controller\CategoryController::getAllCategories' => [[], ['_controller' => 'App\\Controller\\CategoryController::getAllCategories'], [], [['text', '/api/categories/']], [], [], []],
    'App\Controller\CategoryController::getCategory' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::getCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/categories']], [], [], []],
    'App\Controller\CategoryController::createCategory' => [[], ['_controller' => 'App\\Controller\\CategoryController::createCategory'], [], [['text', '/api/categories/']], [], [], []],
    'App\Controller\CategoryController::updateCategory' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::updateCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/categories']], [], [], []],
    'App\Controller\CategoryController::deleteCategory' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::deleteCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/categories']], [], [], []],
    'App\Controller\CustomerController::getAllCategories' => [[], ['_controller' => 'App\\Controller\\CustomerController::getAllCategories'], [], [['text', '/api/customers/']], [], [], []],
    'App\Controller\CustomerController::getCustomer' => [['id'], ['_controller' => 'App\\Controller\\CustomerController::getCustomer'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/customers']], [], [], []],
    'App\Controller\CustomerController::createCustomer' => [[], ['_controller' => 'App\\Controller\\CustomerController::createCustomer'], [], [['text', '/api/customers/']], [], [], []],
    'App\Controller\CustomerController::updateCustomer' => [['id'], ['_controller' => 'App\\Controller\\CustomerController::updateCustomer'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/customers']], [], [], []],
    'App\Controller\CustomerController::deleteCustomer' => [['id'], ['_controller' => 'App\\Controller\\CustomerController::deleteCustomer'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/customers']], [], [], []],
    'App\Controller\OrderController::getAllOrders' => [[], ['_controller' => 'App\\Controller\\OrderController::getAllOrders'], [], [['text', '/api/orders/']], [], [], []],
    'App\Controller\OrderController::getOrder' => [['id'], ['_controller' => 'App\\Controller\\OrderController::getOrder'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/orders']], [], [], []],
    'App\Controller\OrderController::createOrder' => [[], ['_controller' => 'App\\Controller\\OrderController::createOrder'], [], [['text', '/api/orders/']], [], [], []],
    'App\Controller\OrderController::updateCategory' => [['id'], ['_controller' => 'App\\Controller\\OrderController::updateCategory'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/orders']], [], [], []],
    'App\Controller\OrderController::deleteOrder' => [['id'], ['_controller' => 'App\\Controller\\OrderController::deleteOrder'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/orders']], [], [], []],
    'App\Controller\ProductController::getAllProducts' => [[], ['_controller' => 'App\\Controller\\ProductController::getAllProducts'], [], [['text', '/api/products/']], [], [], []],
    'App\Controller\ProductController::getProduct' => [['id'], ['_controller' => 'App\\Controller\\ProductController::getProduct'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/products']], [], [], []],
    'App\Controller\ProductController::createProduct' => [[], ['_controller' => 'App\\Controller\\ProductController::createProduct'], [], [['text', '/api/products/']], [], [], []],
    'App\Controller\ProductController::updateProduct' => [['id'], ['_controller' => 'App\\Controller\\ProductController::updateProduct'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/products']], [], [], []],
    'App\Controller\ProductController::deleteProduct' => [['id'], ['_controller' => 'App\\Controller\\ProductController::deleteProduct'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/products']], [], [], []],
];
