<?php

use Illuminate\Support\Facades\Route;
use Sarker\RolePermissionUi\Http\Controllers\Tailwind\PermissionController as TailwindPermissionController;
use Sarker\RolePermissionUi\Http\Controllers\Tailwind\RoleController as TailwindRoleController;
use Sarker\RolePermissionUi\Http\Controllers\Tailwind\UserController as TailwindUserController;
use Sarker\RolePermissionUi\Http\Controllers\Bootstrap\PermissionController as BootstrapPermissionController;
use Sarker\RolePermissionUi\Http\Controllers\Bootstrap\RoleController as BootstrapRoleController;
use Sarker\RolePermissionUi\Http\Controllers\Bootstrap\UserController as BootstrapUserController;
use Sarker\RolePermissionUi\Http\Controllers\Inertia\PermissionController as InertiaPermissionController;
use Sarker\RolePermissionUi\Http\Controllers\Inertia\RoleController as InertiaRoleController;
use Sarker\RolePermissionUi\Http\Controllers\Inertia\UserController as InertiaUserController;


Route::middleware(['web', 'auth'])->prefix('tailwind')->name('role-permission-ui.tailwind.')->group(function () {
    Route::resource('roles', TailwindRoleController::class);
    Route::resource('permissions', TailwindPermissionController::class)->except(['show', 'edit', 'update']);
    Route::resource('users', TailwindUserController::class)->only(['index', 'edit', 'update']);
});

Route::middleware(['web', 'auth'])->prefix('bootstrap')->name('role-permission-ui.bootstrap.')->group(function () {
    Route::resource('roles', BootstrapRoleController::class);
    Route::resource('permissions', BootstrapPermissionController::class)->except(['show', 'edit', 'update']);
    Route::resource('users', BootstrapUserController::class)->only(['index', 'edit', 'update']);
});
Route::middleware(['web', 'auth'])->prefix('inertia')->name('role-permission-ui.inertia.')->group(function () {
    Route::resource('roles', InertiaRoleController::class);
    Route::resource('permissions', InertiaPermissionController::class)->except(['show', 'edit', 'update']);
    Route::resource('users', InertiaUserController::class)->only(['index', 'edit', 'update']);
});
