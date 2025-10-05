<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('dashboard', 'Dashboard::index');
$routes->post('dashboard/add-menu', 'Menu::addMenu');
$routes->delete('menu/delete/(:num)', 'Menu::deleteMenu/$1');
$routes->get('menu', 'Home::menu');
$routes->post('login', 'Home::login');
$routes->get('logout', 'Home::logout');
