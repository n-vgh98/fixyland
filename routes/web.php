<?php


use App\Http\Controllers\Admin\AdminFaqCategoryController;
use App\Http\Controllers\Admin\AdminFaqController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminRuleController;
use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Admin\AdminScoreController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\AdminAboutUsController;
use App\Http\Controllers\Admin\AdminIndexSliderController;
use App\Http\Controllers\Admin\AdminIndexFeatureController;
use App\Http\Controllers\Admin\AdminAdvertismentsController;
use App\Http\Controllers\Admin\AdminArticleCategoryController;
use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminContactUsController;
use App\Http\Controllers\Admin\AdminContactUsTextController;
use App\Http\Controllers\Admin\AdminCoveredAreaCityController;
use App\Http\Controllers\Admin\AdminCoveredAreaController;
use App\Http\Controllers\Admin\AdminFooterInfoController;
use App\Http\Controllers\Admin\AdminFooterUsefulLinkController;
use App\Http\Controllers\Admin\AdminFormController;
use App\Http\Controllers\Admin\AdminIndexStaticController;
use App\Http\Controllers\Admin\AdminInputController;
use App\Http\Controllers\Admin\AdminNotificationsController;
use App\Http\Controllers\Admin\AdminServiceCategoryController;
use App\Http\Controllers\Admin\AdminServiceSubCategoryController;
use App\Http\Controllers\Admin\AdminSubCategoryServiceDescriptionController;
use App\Http\Controllers\Front\FrontAboutUsController;
use App\Http\Controllers\Front\FrontArticleController;
use App\Http\Controllers\Front\FrontHomeController;
use App\Http\Controllers\Front\FrontServiceController;
use App\Http\Controllers\Front\FrontSpecialistController;
use App\Http\Controllers\Front\FrontUserController;


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

// admin routing
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

    // route for decoratiion
    route::prefix("decoration")->group(function () {
        route::prefix("index")->group(function () {
            // route for slider
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

            // route for features
            route::prefix("features")->group(function () {
                route::controller(AdminIndexFeatureController::class)->group(function () {
                    route::get("/{lang}", "index")->name("admin.decoration.index.features.index");
                    route::post("/store", "store")->name("admin.decoration.index.features.store");
                    route::delete("/destroy/{feature}", "destroy")->name("admin.decoration.index.features.destroy");
                    route::post("/update/{feature}", "update")->name("admin.decoration.index.features.update");
                    route::post("/activate_slider/{feature}", "activate")->name("admin.decoration.index.features.activate");
                    route::post("/deactive_slider/{feature}", "deactive")->name("admin.decoration.index.features.deactive");
                });
            });

            // route for statics
            route::prefix("statics")->group(function () {
                route::controller(AdminIndexStaticController::class)->group(function () {
                    route::get("/{lang}", "index")->name("admin.decoration.index.statics.index");
                    route::post("/store", "store")->name("admin.decoration.index.statics.store");
                    route::delete("/destroy/{static}", "destroy")->name("admin.decoration.index.statics.destroy");
                    route::post("/update/{static}", "update")->name("admin.decoration.index.statics.update");
                    route::post("/activate_slider/{static}", "activate")->name("admin.decoration.index.statics.activate");
                    route::post("/deactive_slider/{static}", "deactive")->name("admin.decoration.index.statics.deactive");
                });
            });
        });
    });

    route::prefix("forms")->group(function () {
        route::controller(AdminFormController::class)->group(function () {
            route::get("/", "index")->name("admin.forms.index");
            route::post("/store", "store")->name("admin.forms.store");
            route::delete("/destroy/{form}", "destroy")->name("admin.forms.destroy");
        });
        route::prefix("questions")->group(function () {
            route::controller(AdminInputController::class)->group(function () {
                route::get("/{form}", "show")->name("admin.forms.questions.show");
                route::post("/store", "store")->name("admin.forms.questions.store");
                route::post("/update/{question}", "update")->name("admin.forms.questions.update");
                route::delete("/destroy/{question}", "destroy")->name("admin.forms.questions.destroy");
                route::post("/activate_question/{question}", "activate")->name("admin.forms.questions.activate");
                route::post("/deactive_question/{question}", "deactive")->name("admin.forms.questions.deactive");
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
            route::controller(AdminSubCategoryServiceDescriptionController::class)->group(function () {
                route::get("/create/{id}", "create")->name("admin.services.subcategory.description.create");
                route::get("/editdescription/{desc}", "edit")->name("admin.services.subcategory.description.edit");
                route::post("/description", "store")->name("admin.services.subcategory.description.store");
                route::post("/updatedescription/{desc}", "update")->name("admin.services.subcategory.description.update");
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
    //routes for faq
    Route::prefix("faq")->group(function () {
        Route::prefix("categories")->group(function () {
            Route::controller(AdminFaqCategoryController::class)->group(function () {
                Route::get("/{lang}", "index")->name('admin.faq_categories.index');
                Route::post("/store", "store")->name('admin.faq_categories.store');
                Route::post("/update/{id}", "update")->name('admin.faq_categories.update');
                Route::delete("/destroy/{id}", "destroy")->name('admin.faq_categories.delete');
            });
        });
        Route::controller(AdminFaqController::class)->group(function () {
            Route::get("/{lang}", "index")->name('admin.faq.index');
            Route::post("/store", "store")->name('admin.faq.store');
            Route::post("/update/{id}", "update")->name('admin.faq.update');
            Route::delete("/destroy/{id}", "destroy")->name('admin.faq.delete');
        });
    });

    //routes of articles and article category
    Route::prefix("articles")->group(function () {
        Route::prefix("categories")->group(function () {
            Route::controller(AdminArticleCategoryController::class)->group(function () {
                Route::get("/{lang}", "index")->name('admin.article_categories.index');
                Route::post("/store", "store")->name('admin.article_categories.store');
                Route::post("/update/{id}", "update")->name('admin.article_categories.update');
                Route::delete("/destroy/{id}", "destroy")->name('admin.article_categories.delete');
            });
        });
        Route::controller(AdminArticleController::class)->group(function () {
            Route::get("/{lang}", "index")->name('admin.articles.index');
            Route::get("/create/{lang}", "create")->name('admin.articles.create');
            Route::post("/store", "store")->name('admin.articles.store');
            Route::get("/edit/{id}/{lang}", "edit")->name('admin.articles.edit');
            Route::post("/update/{id}", "update")->name('admin.articles.update');
            Route::delete("/destroy/{id}", "destroy")->name('admin.articles.delete');
        });
    });

    //routes for contact_us
    Route::prefix("contact_us")->group(function () {
        Route::prefix("texts")->group(function () {
            Route::controller(AdminContactUsTextController::class)->group(function () {
                Route::get("/{lang}", "index")->name('admin.contact_us.texts.index');
                Route::get("/create/{lang}", "create")->name('admin.contact_us.texts.create');
                Route::post("/store", "store")->name('admin.contact_us.texts.store');
                Route::get("/edit/{id}/", "edit")->name('admin.contact_us.texts.edit');
                Route::post("/update/{id}", "update")->name('admin.contact_us.texts.update');
                Route::delete("/destroy/{id}", "destroy")->name('admin.contact_us.texts.delete');
            });
        });
        Route::controller(AdminContactUsController::class)->group(function () {
            Route::get("/", "index")->name('admin.contact_us.index');
        });
    });

    //routes for footer
    Route::prefix("footer")->group(function () {
        Route::prefix("information")->group(function () {
            Route::controller(AdminFooterInfoController::class)->group(function () {
                Route::get("/{lang}", "index")->name('admin.footer_info.index');
                Route::post("/store", "store")->name('admin.footer_info.store');
                Route::post("/update/{id}", "update")->name('admin.footer_info.update');
                Route::delete("/destroy/{id}", "destroy")->name('admin.footer_info.delete');
            });
        });
        Route::controller(AdminFooterUsefulLinkController::class)->group(function () {
            Route::get("/{lang}", "index")->name('admin.footer_useful_links.index');
            Route::post("/store", "store")->name('admin.footer_useful_links.store');
            Route::post("/update/{id}", "update")->name('admin.footer_useful_links.update');
            Route::delete("/destroy/{id}", "destroy")->name('admin.footer_useful_links.delete');
        });
    });

    //routes for covered area
    Route::prefix("covered_area")->group(function () {
        Route::prefix("states")->group(function () {
            Route::controller(AdminCoveredAreaController::class)->group(function () {
                Route::get("/{lang}", "index")->name('admin.covered_state.index');
                Route::post("/store", "store")->name('admin.covered_state.store');
                Route::post("/update/{id}", "update")->name('admin.covered_state.update');
                Route::delete("/destroy/{id}", "destroy")->name('admin.covered_state.delete');
            });
        });
        Route::prefix("cities")->group(function () {
            Route::controller(AdminCoveredAreaCityController::class)->group(function () {
                Route::get("/{lang}", "index")->name('admin.covered_city.index');
                Route::post("/store", "store")->name('admin.covered_city.store');
                Route::post("/update/{id}", "update")->name('admin.covered_city.update');
                Route::delete("/destroy/{id}", "destroy")->name('admin.covered_city.delete');
            });
        });
    });
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
// end for admin routing


// always redirect domain to english site
route::get("/", function () {
    return redirect("/en");
});

// route::get("login", function () {
//     return redirect()->route("user.login", "ar");
// });

route::prefix("{locale}")->middleware("language")->group(function () {

    route::prefix("register")->group(function () {
        // authentication routes
        route::get("/", [FrontHomeController::class, "register"])->name("user.register");
        // route for seprated signup forms
        route::prefix("sign-up")->group(function () {
            route::get("/user", [FrontUserController::class, "index"])->name("user.register.signup.user");
            route::post("/getcity", [FrontUserController::class, "getcity"])->name("user.register.get.city");
            route::post("/registeruser", [FrontUserController::class, "store"])->name("user.register.store");
            route::get("/specialist", [FrontSpecialistController::class, "index"])->name("user.register.signup.specialist");
        });
    });
    route::get("login", [FrontHomeController::class, "login"])->name("user.login");

    route::prefix("services")->group(function () {
        route::get("descrition/{id}", [FrontServiceController::class, "description"])->name("user.service.description");
        route::get("form/{id}", [FrontServiceController::class, "form"])->name("user.service.form");
    });

    route::get("/", [FrontHomeController::class, "index"])->name("user.home");
    Route::prefix("articles")->group(function(){
        Route::controller(FrontArticleController::class)->group(function(){
            Route::get("/","index")->name("front.articles.index");
            Route::get("/{id}/{slug}","show")->name("front.article.show");
        });
    });
    Route::get("/about_us",[FrontAboutUsController::class,"index"])->name("front.about_us");
});
