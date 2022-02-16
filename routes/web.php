<?php

use App\Http\Controllers\Admin\AdminAboutUsController;
use App\Http\Controllers\Admin\AdminAdvertismentsController;
use App\Http\Controllers\Admin\AdminIndexSliderController;
use App\Http\Controllers\Admin\AdminNotificationsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Admin\AdminRuleController;
use App\Http\Controllers\Admin\AdminScoreController;
use App\Http\Controllers\Admin\AdminServiceCategoryController;
use App\Http\Controllers\Admin\AdminServiceSubCategoryController;
use App\Http\Controllers\Admin\AdminUsersController;

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

            // route for creating new user
            route::post("/make_new_user", "createUser")->name("admin.users.create");

            // route for updating  user
            route::post("/update_user/{user}", "edituser")->name("admin.users.update");
        });
    });

    // route for
    route::prefix("decoration")->group(function () {
        route::prefix("index")->group(function () {
            route::prefix("slider")->group(function () {
                route::controller(AdminIndexSliderController::class)->group(function () {
                    route::get("/{lang}", "index")->name("admin.decoration.index.slider.index");
                    route::post("/store", "store")->name("admin.decoration.index.slider.store");
                    route::delete("/destroy/{slider}", "destroy")->name("admin.decoration.index.slider.destroy");
                    route::post("/update/{slider}", "update")->name("admin.decoration.index.slider.update");
                    route::post("/activate_slider/{slider}", "activate")->name("admin.decoration.index.slider.activate");
                    route::post("/deactive_slider/{slider}", "deactive")->name("admin.decoration.index.slider.deactive");
                });
            });
        });
    });

    // route for  scores
    route::prefix("scores")->group(function () {
        route::controller(AdminScoreController::class)->group(function () {
            route::get("/{lang}", "index")->name("admin.scores.index");
            route::post("/store", "store")->name("admin.scores.store");
            route::delete("/destroy/{score}", "destroy")->name("admin.scores.destroy");
            route::post("/update/{score}", "update")->name("admin.scores.update");
            route::post("/activate_score/{score}", "activate")->name("admin.scores.activate");
            route::post("/deactive_score/{score}", "deactive")->name("admin.scores.deactive");
        });
    });

    // route for notifing users
    route::prefix("notifications")->group(function () {
        route::controller(AdminNotificationsController::class)->group(function () {
            route::get("/", "index")->name("admin.notifications.all");
            route::get("/superadmins", "superadmins")->name("admin.notifications.superadmins");
            route::get("/customers", "customers")->name("admin.notifications.customers");
            route::get("/admins", "admins")->name("admin.notifications.admins");
            route::get("/technicians", "technicians")->name("admin.notifications.technicians");
            route::get("/show/{notification}", "show")->name("admin.notifications.show");
            route::post("/store", "store")->name("admin.notifications.store");
            route::post("/{notification}", "update")->name("admin.notifications.update");
            route::delete("/{notification}", "destroy")->name("admin.notifications.destroy");
        });
    });

    // route for advertisment
    route::prefix("advertisment")->group(function () {
        route::controller(AdminAdvertismentsController::class)->group(function () {
            route::get("/{lang}", "index")->name("admin.ads.index");
            route::post("/store", "store")->name("admin.ads.store");
            route::post("/update/{id}", "update")->name("admin.ads.update");
            route::delete("/destroy/{ads}", "destroy")->name("admin.ads.destroy");
            route::post("/activate_ad/{ad}", "activate")->name("admin.ads.activate");
            route::post("/deactive_ad/{ad}", "deactive")->name("admin.ads.deactive");
        });
    });

    // route for services
    route::prefix("services")->group(function () {
        // routing for service categories
        route::prefix("categories")->group(function () {
            route::controller(AdminServiceCategoryController::class)->group(function () {
                route::get("/{lang}", "index")->name("admin.services.category.index");
                route::post("/", "store")->name("admin.services.category.store");
                route::delete("/destroy/{category}", "destroy")->name("admin.services.category.destroy");
                route::post("/update/{category}", "update")->name("admin.services.category.update");
                route::post("/activate_category/{category}", "activate")->name("admin.services.category.activate");
                route::post("/deactive_category/{category}", "deactive")->name("admin.services.category.deactive");
            });
        });

        // routing for service subcategories
        route::prefix("subcategories")->group(function () {
            route::controller(AdminServiceSubCategoryController::class)->group(function () {
                route::get("/", "index")->name("admin.services.subcategory.index");
                route::get("/show/{category}", "show")->name("admin.services.subcategory.show");
                route::post("/", "store")->name("admin.services.subcategory.store");
                route::delete("/destroy/{subcategory}", "destroy")->name("admin.services.subcategory.destroy");
                route::post("/update/{subcategory}", "update")->name("admin.services.subcategory.update");
                route::post("/activate_category/{subcategory}", "activate")->name("admin.services.subcategory.activate");
                route::post("/deactive_category/{subcategory}", "deactive")->name("admin.services.subcategory.deactive");
                route::post("/popular_category/{subcategory}", "popular")->name("admin.services.subcategory.popular");
                route::post("/hate_category/{subcategory}", "hate")->name("admin.services.subcategory.hate");
            });
        });
    });

    //routes for rules
    Route::prefix("rules")->group(function () {
        Route::controller(AdminRuleController::class)->group(function () {
            Route::get("/{lang}", "index")->name('admin.rules.index');
            Route::get("/create/{lang}", "create")->name('admin.rules.create');
            Route::post("/store", "store")->name('admin.rules.store');
            Route::get("/edit/{id}", "edit")->name('admin.rules.edit');
            Route::post("/update/{id}", "update")->name('admin.rules.update');
            Route::delete("/destroy/{id}", "destroy")->name('admin.rules.delete');
        });
    });
    //rutes for about us
    Route::prefix("about_us")->group(function () {
        Route::controller(AdminAboutUsController::class)->group(function () {
            Route::get("/{lang}", "index")->name('admin.about_us.index');
            Route::get("/create/{lang}", "create")->name('admin.about_us.create');
            Route::post("/store", "store")->name('admin.about_us.store');
            Route::get("/edit/{id}", "edit")->name('admin.about_us.edit');
            Route::post("/update/{id}", "update")->name('admin.about_us.update');
            Route::delete("/destroy/{id}", "destroy")->name('admin.about_us.delete');
        });
    });
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
