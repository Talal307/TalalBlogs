<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
use App\Controllers\AuthController;

// Authentication Routes (Section 15.2)
$routes->get('register', [AuthController::class, 'registerForm']);
$routes->post('register', [AuthController::class, 'register']);
$routes->get('login', [AuthController::class, 'loginForm']);
$routes->post('login', [AuthController::class, 'login']);
$routes->post('logout', [AuthController::class, 'logout']);
$routes->get('dashboard', function () {
    if (! session()->get('isLoggedIn')) {
        return redirect()->to('/login')->with('error', 'Please log in first.');
    }
    return '<h1>Welcome to your Dashboard, ' . esc(session()->get('userName')) . '!</h1><a href="/logout">Logout</a>';
});
