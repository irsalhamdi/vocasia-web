<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');

$routes->group('admin', ['namespace' => 'App\Controllers\Backend'], function ($routes) {
    $routes->get('course', 'Courses::index');
    $routes->get('course-detail', 'Courses::show_detail');
    $routes->post('course-add', 'Courses::create');
    $routes->post('course-update', 'Courses::update');
    $routes->delete('course-delete', 'Courses::delete');
    $routes->get('category', 'Category::index');
    $routes->get('category/(:num)', 'Category::show/$1');
    $routes->post('category/create', 'Category::create');
    $routes->put('category/(:num)', 'Category::update/$1');
    $routes->patch('category/(:num)', 'Category::update/$1');
    $routes->delete('category/(:num)', 'Category::delete/$1');
    $routes->get('coupon', 'Coupon::index');
    $routes->get('coupon-detail/(:num)', 'Coupon::show_detail/$1');
    $routes->post('coupon-add', 'Coupon::create');
    $routes->post('coupon-update/(:num)', 'Coupon::update/$1');
    $routes->delete('coupon-delete/(:num)', 'Coupon::delete/$1');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
