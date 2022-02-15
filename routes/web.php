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
            route::get("/Super_Admins", "superadmins")->name("admin.users.superadmins");
            route::get("/admins", "admins")->name("admin.users.admins");
            route::get("/technicians", "technicians")->name("admin.users.technicians");
            route::get("/users", "customers")->name("admin.users.customers");
            route::post("/activate_user/{user}", "activate")->name("admin.users.activate");
            route::post("/deactive_user/{user}", "deactive")->name("admin.users.deactive");
            route::DELETE("/destroy/{user}", "destroy")->name("admin.users.destroy");

            // routes for changing rolls
            route::post("/change_to_SuperAdmin/{user}", "promotetoSuperAdmin")->name("admin.users.changetosuperadmin");
            route::post("/change_to_Admin/{user}", "promotetoAdmin")->name("admin.users.changetoadmin");
            route::post("/change_to_User/{user}", "promotetoUser")->name("admin.users.changetouser");
            route::post("/change_to_Technician/{user}", "promotetoTechnician")->name("admin.users.changetotechnician");
        });
    });
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
