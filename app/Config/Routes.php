<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('media/(:segment)', '\App\Controllers\Front\MediaAccess::viewMedia/$1');

$routes->group('', ['namespace' => 'App\Controllers\Front'], static function ($routes) {
    $routes->get('/', 'Beranda::index');
    $routes->get('/tentang-kami', 'Beranda::about');

    $routes->group('kontak', static function ($routes) {
        $routes->get('/', 'Kontak::index');
        $routes->post('save', 'Kontak::save_kontak');
    });

    $routes->group('projek', static function ($routes) {
        $routes->get('/', 'Projek::index');
        $routes->get('(:segment)', 'Projek::detail/$1');
        $routes->get('kategori/(:segment)', 'Projek::kategoriPost/$1');
    });
});


$routes->group('admin', ['namespace' => 'App\Controllers\Back'], static function ($routes) {

    $routes->get('logout', 'Auth::logout');
    $routes->get('login', 'Auth::login');
    $routes->post('login-do', 'Auth::doLogin');

    $routes->group('/', ['filter' => 'isLoggedIn', 'namespace' => 'App\Controllers\Back'], static function ($routes) {
        $routes->get('/', 'Dashboard::index');

        $routes->group('kategori', static function ($routes) {
            $routes->get('/', 'Kategori::index', ['filter' => 'isAdmin']);
            $routes->post('list', 'Kategori::list', ['filter' => 'isAdmin']);
            $routes->post('form', 'Kategori::form', ['filter' => 'isAdmin']);
            $routes->post('save', 'Kategori::save', ['filter' => 'isAdmin']);
            $routes->post('delete', 'Kategori::delete', ['filter' => 'isAdmin']);
        });

        $routes->group('media', static function ($routes) {
            $routes->get('/', 'Media::index');
            $routes->post('list', 'Media::list');
            $routes->post('form', 'Media::form');
            $routes->post('save', 'Media::save');
            $routes->post('delete', 'Media::delete');
        });

        $routes->group('projek', static function ($routes) {
            $routes->get('/', 'Projek::index');
            $routes->post('datatable', 'Projek::getDatatable');
            $routes->post('list', 'Projek::list');
            $routes->post('media', 'Projek::getMedia');
            $routes->post('detail', 'Projek::getDetailMedia');
            $routes->post('form', 'Projek::form');
            $routes->post('save', 'Projek::save');
            $routes->post('delete', 'Projek::delete');
        });

        $routes->group('kontak', static function ($routes) {
            $routes->get('/', 'Kontak::index', ['filter' => 'isAdmin']);
            $routes->post('list', 'Kontak::list', ['filter' => 'isAdmin']);
            $routes->post('form', 'Kontak::form', ['filter' => 'isAdmin']);
            $routes->post('save', 'Kontak::save', ['filter' => 'isAdmin']);
            $routes->post('delete', 'Kontak::delete', ['filter' => 'isAdmin']);
        });

        $routes->group('user', static function ($routes) {
            $routes->get('/', 'UserController::index', ['filter' => 'isAdmin']);
            $routes->post('list', 'UserController::list', ['filter' => 'isAdmin']);
            $routes->post('form', 'UserController::form', ['filter' => 'isAdmin']);
            $routes->post('save', 'UserController::save', ['filter' => 'isAdmin']);
            $routes->post('delete', 'UserController::delete', ['filter' => 'isAdmin']);
        });

        $routes->group('setting', static function ($routes) {
            $routes->get('(:segment)', 'Setting::index/$1', ['filter' => 'isAdmin']);
            $routes->post('datatable', 'Setting::getDatatable', ['filter' => 'isAdmin']);
            $routes->post('list', 'Setting::list', ['filter' => 'isAdmin']);
            $routes->post('form', 'Setting::form', ['filter' => 'isAdmin']);
            $routes->post('save', 'Setting::save', ['filter' => 'isAdmin']);
            $routes->post('delete', 'setting::delete');
        });
    });
});

