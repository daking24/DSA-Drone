<?php

use App\Http\Controllers\Admin\UserManager;
use App\Http\Controllers\Admin\DroneManager;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\LocationManger;
use App\Http\Controllers\ViewerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthManager::class, 'index'])->name('home');
Route::get('/login', [AuthManager::class, 'showLoginForm'])->name('view.login');
Route::post('/login', [AuthManager::class, 'login'])->name('login');



Route::middleware('auth')->group(function () {

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        // Users
        Route::get('/admin/users', [UserManager::class, 'index'])->name('admin.users');
        Route::post('/admin/users', [UserManager::class, 'createUser'])->name('admin.createUser');
        Route::get('/admin/users/{user}/edit', [UserManager::class, 'edit'])->name('admin.editUser');
        Route::put('/admin/users/{user}', [UserManager::class, 'update'])->name('admin.updateUser');
        Route::delete('/admin/users/{user}', [UserManager::class, 'destroyUser'])->name('admin.deleteUser');

        // Locations
        Route::get('/admin/locations', [LocationManger::class, 'index'])->name('admin.locations');
        Route::post('/admin/locations', [LocationManger::class, 'create'])->name('admin.createLocation');
        Route::get('/admin/locations/{location}/edit', [LocationManger::class, 'edit'])->name('admin.editLocation');
        Route::put('/admin/locations/{location}', [LocationManger::class, 'update'])->name('admin.updateLocation');
        Route::delete('/admin/locations/{location}', [LocationManger::class, 'delete'])->name('admin.deleteLocation');

        // Drones
        Route::get('/admin/drones', [DroneManager::class, 'index'])->name('admin.drones');
        Route::post('/admin/drones', [DroneManager::class, 'create'])->name('admin.createDrone');
        Route::get('/admin/drones/{drone}/edit', [DroneManager::class, 'edit'])->name('admin.editDrone');
        Route::put('/admin/drones/{drone}', [DroneManager::class, 'update'])->name('admin.updateDrone');
        Route::delete('/admin/drones/{drone}', [DroneManager::class, 'delete'])->name('admin.deleteDrone');
    });

    Route::middleware('role:viewer,editor')->group(function () {
        Route::get('/user/dashboard', [ViewerController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/user/drone/{id}', [ViewerController::class, 'viewDrone'])->name('drone.view');
    });
    Route::post('/logout', [AuthManager::class, 'logout'])->name('logout');
});



