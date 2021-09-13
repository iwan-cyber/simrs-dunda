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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.



// mengatus hak akses group user


$routes->get('/', 'User::index');


$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);

$routes->get('/setingaplikasi', 'setingaplikasi::index', ['filter' => 'role:admin']);
$routes->get('/setingaplikasi/managemenUser', 'setingaplikasi::managemenUser', ['filter' => 'role:admin']);
$routes->get('/setingaplikasi/pengaturanumum', 'setingaplikasi::pengaturanumum', ['filter' => 'role:admin']);
$routes->get('/setingaplikasi/ambilAntrianLoket', 'setingaplikasi::ambilAntrianLoket', ['filter' => 'role:admin']);
$routes->get('/setingaplikasi/BridgingEktp', 'setingaplikasi::BridgingEktp', ['filter' => 'role:admin']);


//routing untuk master
$routes->get('/master/pekerjaan', 'Pekerjaan::index', ['filter' => 'role:admin']);
$routes->get('/master/pekerjaan/data', 'Pekerjaan::dataPekerjaan', ['filter' => 'role:admin']);
$routes->post('/master/pekerjaan/simpan', 'Pekerjaan::simpan', ['filter' => 'role:admin']);

$routes->get('/master/ruangan', 'Master/Ruangan::index');
$routes->get('/master/ruangan/data', 'Master/Ruangan::data');

$routes->get('/master', 'Master/Master::index');


//routing untuk referensi detail
$routes->post('/master/referensi/detail/simpan', 'Master/Referensi::simpanDetail');
$routes->post('/master/referensi/detail/get/(:num)', 'Master/Referensi::getDetail');
$routes->post('/master/referensi/detail/hapus', 'Master/Referensi::hapusDetail');

//routing untuk pegawai
$routes->get('/master/pegawai/unit', 'Master/PegawaiUnit::index');

//routing untuk pegawai
$routes->get('/master/pegawai/profesi', 'Master/PegawaiProfesi::index');
$routes->post('/master/pegawai/profesi/simpan', 'Master/PegawaiProfesi::simpan');
$routes->post('/master/pegawai/profesi/hapus/(:num)', 'Master/PegawaiProfesi::hapus');
$routes->post('/master/pegawai/profesi/(:num)', 'Master/PegawaiProfesi::get');


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
