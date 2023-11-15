<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('view-product','ProductControl::viewProduct');
$routes->post('insert-product','ProductControl::insertProduct');
$routes->get('readproduct', 'ProductControl::readProduct');
$routes->get('editproduct/(:any)', 'ProductControl::getProduct/$1');
$routes->post('update-product/(:any)', 'ProductControl::updateProduct/$1');
$routes->get('deleteproduct/(:any)', 'ProductControl::deleteProduct/$1');


$routes->group('api',function ($routes) {
    $routes->get('product', 'ProductControl::readProductApi');
    $routes->get('product/(:any)', 'ProductControl::getProductApi/$1');
    $routes->post('insertProduct', 'ProductControl::insertProductApi');
    $routes->put('update-product-api/(:num)', 'ProductController::updateProductApi/$1');
    $routes->delete('delete-product-api/(:num)', 'ProductController::deleteProductApi/$1');
});