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

