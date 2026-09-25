<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Pages::home');
$routes->get('about', 'Pages::about');
$routes->get('customers', 'Customers::index');
$routes->post('customers', 'Customers::create');
$routes->get('users', 'Users::index');
$routes->post('users', 'Users::create');
