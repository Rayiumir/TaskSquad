<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], static function ($router){

    // Admin

    $router->get('/', \App\Livewire\Support\Admin\Index::class)->name('admin.index');
    $router->get('/logout', [\App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');

    // Users

    $router->get('/users', \App\Livewire\Support\Users\Index::class)->name('users.index');
    $router->get('/users/create', \App\Livewire\Support\Users\Create::class)->name('users.create');
    $router->get('/users/user/{user}', \App\Livewire\Support\Users\Edit::class)->name('users.edit');
    $router->get('/users/trash', \App\Livewire\Support\Users\Trash::class)->name('users.trash');
    $router->get('/users/{user}/permissions', \App\Livewire\Support\Users\PermissionUser::class)->name('permissionUser.create');

    // Groups

    $router->get('/groups', \App\Livewire\Support\Groups\Index::class)->name('groups.index');
    $router->get('/groups/create', \App\Livewire\Support\Groups\Create::class)->name('groups.create');

    // Roles

    $router->get('/roles', \App\Livewire\Support\Roles\Index::class)->name('roles.index');
    $router->get('/roles/create', \App\Livewire\Support\Roles\Create::class)->name('roles.create');

    // Permissions

    $router->get('/permissions', \App\Livewire\Support\Permissions\Index::class)->name('permissions.index');
    $router->get('/permissions/create', \App\Livewire\Support\Permissions\Create::class)->name('permissions.create');

    // Tasks

    $router->get('/tasks', \App\Livewire\Support\Tasks\Index::class)->name('tasks.index');
    $router->get('/tasks/create', \App\Livewire\Support\Tasks\Create::class)->name('tasks.create');
    $router->get('/tasks/send', \App\Livewire\Support\Tasks\Send::class)->name('tasks.send');

    // Projects

    $router->get('/projects', \App\Livewire\Support\Projects\Index::class)->name('projects.index');
    $router->get('/projects/create', \App\Livewire\Support\Projects\Create::class)->name('projects.create');
    $router->get('/projects/{id}/status', \App\Livewire\Support\Projects\Status::class)->name('projects.status');
});
