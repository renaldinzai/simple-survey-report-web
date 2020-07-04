<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/users', 'Users::index');
$routes->post('/users/login', 'Users::login');

$routes->get('/admin', 'Users\Admin::index');
$routes->get('/admin/(:any)/(:num)', 'Users\Admin::$1/$2');
$routes->get('/admin/(:any)', 'Users\Admin::$1');
$routes->post('/admin/(:any)/(:num)', 'Users\Admin::$1/$2');
$routes->post('/admin/(:any)', 'Users\Admin::$1');
$routes->delete('/admin/deleteMarketCommodity/(:num)', 'Users\Admin::deleteMarketCommodity/$1');

$routes->get('/surveyor', 'Users\Surveyor::index');
$routes->get('/surveyor/commodity/(:segment)', 'Users\Surveyor::detail/$1');
$routes->get('/surveyor/(:any)/(:segment)', 'Users\Surveyor::$1/$2');
$routes->get('/surveyor/(:any)', 'Users\Surveyor::$1');
$routes->post('/surveyor/(:any)/(:segment)', 'Users\Surveyor::$1/$2');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
