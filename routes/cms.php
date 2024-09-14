<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'cms',
    'as' => 'cms.',
    'middleware' => ['auth', 'validate-role-permission'],
], function () {
    Route::get('/dashboard', App\Livewire\Cms\Dashboard::class)->name('dashboard');

    // Management Menu
    Route::get('/management/menu', App\Livewire\Cms\Dashboard::class)->name('management.menu');
    Route::get('/management/menu/{menu}', App\Livewire\Cms\Dashboard::class)->name('management.menu.child');

    // Management Role
    Route::get('/management/role', App\Livewire\Cms\Dashboard::class)->name('management.role');
    Route::get('/management/role-permission/{role?}', App\Livewire\Cms\Dashboard::class)->name('management.role-permission');

    // Logs
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->name('logs');
});
