<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('DasboardAnggaranKAS');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//report anggaran kas

//report apbd

//login
$routes->post('do_login', 'login::do_login');
$routes->post('do_login2', 'login::do_login2');
$routes->get('login_rak', 'login::login_rak');
$routes->get('login_apbd', 'login::login_apbd');
$routes->get('log_outrak', 'login::log_outrak');
$routes->get('log_outapbd', 'login::log_outapbd');

$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'ReportRAK::DasboardAnggaranKAS');
	$routes->get('DasboardAnggaranKAS', 'ReportRAK::DasboardAnggaranKAS');
	$routes->get('AnggaranKasJanuari', 'ReportRAK::AnggaranKasJanuari');
	$routes->get('AnggaranKasFebruari', 'ReportRAK::AnggaranKasFebruari');
	$routes->get('AnggaranKasMaret', 'ReportRAK::AnggaranKasMaret');
	$routes->get('AnggaranKasApril', 'ReportRAK::AnggaranKasApril');
	$routes->get('AnggaranKasMei', 'ReportRAK::AnggaranKasMei');
	
});

$routes->group('', ['filter' => 'auth2'], function ($routes) {
    $routes->get('DashboardAPBD', 'ReportAPBD::DashboardAPBD');
	$routes->get('DashboardAPBD/DetailBelanja/(:any)', 'ReportAPBD::DetailBelanja/$1');


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
