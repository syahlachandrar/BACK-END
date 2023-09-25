<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('insert-product','ProductControl::insertProduct');
$routes->get('readproduct', 'ProductControl::readProduct');

