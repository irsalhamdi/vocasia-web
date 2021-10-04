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
    $routes->get('courses', 'Courses::index');
    $routes->get('course/(:num)', 'Courses::show_detail/$1');
    $routes->post('course', 'Courses::create');
    $routes->put('course/(:num)', 'Courses::update/$1');
    $routes->delete('course/(:num)', 'Courses::delete/$1');
    $routes->get('categories', 'Category::index');
    $routes->get('category/(:num)', 'Category::show/$1');
    $routes->post('category', 'Category::create');
    $routes->put('category/(:num)', 'Category::update/$1');
    $routes->delete('category/(:num)', 'Category::delete/$1');
    $routes->get('coupons', 'Coupon::index');
    $routes->get('coupon/(:num)', 'Coupon::show_detail/$1');
    $routes->post('coupon', 'Coupon::create');
    $routes->put('coupon/(:num)', 'Coupon::update/$1');
    $routes->delete('coupon/(:num)', 'Coupon::delete/$1');
    $routes->get('users-mitra', 'UsersMitra::index');
    $routes->get('users-mitra/(:num)', 'UsersMitra::show_detail/$1');
    $routes->post('users-mitra', 'UsersMitra::create');
    $routes->put('users-mitra/(:num)', 'UsersMitra::update/$1');
    $routes->delete('users-mitra/(:num)', 'UsersMitra::delete/$1');
    $routes->get('affiliates', 'Affiliate::index');
    $routes->get('affiliate/(:num)', 'Affiliate::show_detail/$1');
    $routes->post('affiliate', 'Affiliate::create');
    $routes->put('affiliate/(:num)', 'Affiliate::update/$1');
    $routes->delete('affiliate/(:num)', 'Affiliate::delete/$1');
    $routes->get('enrols', 'Enrol::index');
    $routes->get('enrol/(:num)', 'Enrol::show_detail/$1');
    $routes->post('enrol', 'Enrol::create');
    $routes->put('enrol/(:num)', 'Enrol::update/$1');
    $routes->delete('enrol/(:num)', 'Enrol::delete/$1');
    $routes->get('revenue', 'Revenue::admin_revenue');
    $routes->get('revenue-instructor/(:num)', 'Revenue::instructor_revenue/$1');
    $routes->patch('delete/revenue-admin', 'Revenue::update_admin_revenue');
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
