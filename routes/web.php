<?php

use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\AdminUsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

route::prefix("admin")->middleware(['auth:sanctum', 'verified', "admin"])->group(function () {

    // new way to use a controller for all routes
    route::controller(AdminPanelController::class)->group(function () {
        route::get("/home", "index")->name("admin.panel");
    });

    // route for showing users
    route::prefix("users")->group(function () {
        route::controller(AdminUsersController::class)->group(function () {
            route::get("/All_Users", "all")->name("admin.users.all");
            route::get("/admins", "admins")->name("admin.users.admins");
            route::get("/technicians", "technicians")->name("admin.users.technicians");
            route::get("/users", "users")->name("admin.users.users");
            route::post("/activate_user/{user}", "activate")->name("admin.users.activate");
            route::post("/deactive_user/{user}", "deactive")->name("admin.users.deactive");
            route::delete("/destroy/{user}", "destroy")->name("admin.users.destroy");
        });
    });
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
