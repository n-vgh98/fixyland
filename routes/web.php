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
use App\Http\Controllers\Admin\AdminDiscountController;
use App\Http\Controllers\Admin\AdminFooterInfoController;
use App\Http\Controllers\Admin\AdminFooterUsefulLinkController;
use App\Http\Controllers\Admin\AdminFormController;
use App\Http\Controllers\Admin\AdminIndexStaticController;
use App\Http\Controllers\Admin\AdminInputController;
use App\Http\Controllers\Admin\AdminNotificationsController;
use App\Http\Controllers\Admin\AdminPaymentController;
use App\Http\Controllers\Admin\AdminServiceCategoryController;
use App\Http\Controllers\Admin\AdminServiceSubCategoryController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminSubCategoryServiceDescriptionController;
use App\Http\Controllers\Admin\AdminTransactionController;
use App\Http\Controllers\Front\FrontAboutUsController;
use App\Http\Controllers\Front\FrontArticleController;
use App\Http\Controllers\Front\FrontContactUsController;
use App\Http\Controllers\Front\FrontFaqController;
use App\Http\Controllers\Front\FrontHomeController;
use App\Http\Controllers\Front\FrontRuleController;
use App\Http\Controllers\Front\FrontServiceController;
use App\Http\Controllers\Front\FrontSpecialistController;
use App\Http\Controllers\Front\FrontSpecialistPanelController;
use App\Http\Controllers\Front\FrontUserController;
use App\Http\Controllers\Front\FrontUserPanelController;
use App\Http\Controllers\User\ChatController;
use GuzzleHttp\Middleware;

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

    //routes for order list
    route::prefix("orders")->group(function () {
        route::controller(AdminTransactionController::class)->group(function () {
            route::get("/", "index")->name("admin.transaction.index");
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

    // routes for discounts
    route::prefix("discounts")->group(function () {
        route::get("/", [AdminDiscountController::class, "index"])->name("admin.discount.index");
        route::post("/store", [AdminDiscountController::class, "store"])->name("admin.discount.store");
        route::delete("/delete/{id}", [AdminDiscountController::class, "destroy"])->name("admin.discount.delete");
    });

    // routes for settingss
    route::prefix("settings")->group(function () {
        route::get("/", [AdminSettingController::class, "index"])->name("admin.setting.index");
        route::post("/store", [AdminSettingController::class, "store"])->name("admin.setting.store");
        route::delete("/delete/{id}", [AdminSettingController::class, "destroy"])->name("admin.setting.delete");
    });

    // routes for rewards
    route::prefix("settings")->group(function () {
        route::post("/store", [Admin::class, "store"])->name("admin.setting.store");
    });
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
// end for admin routing


// always redirect domain to english site
route::get("/", function () {
    return redirect("/ar");
})->name("home");

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
            route::post("/specialiststore", [FrontSpecialistController::class, "store"])->name("user.register.signup.specialist.store");
        });
    });
    route::get("login", [FrontHomeController::class, "login"])->name("user.login");


    // route for geting service
    route::prefix("services")->middleware(['auth:sanctum', 'verified', "user"])->group(function () {
        route::get("descripion/{id}", [FrontServiceController::class, "description"])->name("user.service.description");
        route::get("form/{id}", [FrontServiceController::class, "form"])->name("user.service.form");

        // route for saving form
        route::post("/resultsave", [FrontServiceController::class, "resultsave"])->name("user.service.form.result.save");
        route::get("/techfindmethod", [FrontServiceController::class, "findmethod"])->name("user.service.form.find.method");

        // id means order id
        route::get("/findrequest/{id}", [FrontServiceController::class, "findrequest"])->name("user.service.find.request");
        route::get("/autofind/{id}", [FrontServiceController::class, "autofind"])->name("user.service.form.find.auto");
        route::post("/autofindcancel/{id}", [FrontServiceController::class, "autofindcancel"])->name("user.service.form.cancel.auto");
        route::get("/customfind/{id}", [FrontServiceController::class, "customfind"])->name("user.service.form.find.custom");
        route::post("/customselect", [FrontServiceController::class, "customselect"])->name("user.service.form.custom.select");


        // chech if order is accepted by technician
        route::get("/checker/{id}", [FrontServiceController::class, "checker"])->name("user.service.find.checker");
    });


    // routes for  technician panel
    route::prefix("technicianpanel")->middleware(['auth:sanctum', 'verified', "technician"])->group(function () {
        route::controller(FrontSpecialistPanelController::class)->group(function () {
            route::get("/", "index")->name("front.technician.panel.show");
            route::get("/edit", "edit")->name("front.technician.panel.edit");
            route::get("/changepassword", "changepassword")->name("front.technician.panel.changepassword");
            route::get("/notifications", "notification")->name("front.technician.panel.notification");
            route::post("/updateprofile", "updateprofile")->name("front.technician.panel.update.profile");
            route::post("/updateadress", "updateadress")->name("front.technician.panel.update.address");
            route::post("/updateskill/{skill_id}", "updateskill")->name("front.technician.panel.update.skill");
            route::post("/updatebankinfo", "updatebankinfo")->name("front.technician.panel.update.bankinfo");
            route::post("/deleteportfolio/{pid}", "deleteporfolio")->name("front.technician.panel.delete.portfolio");
            route::post("/addportfolio", "addporfolio")->name("front.technician.panel.add.portfolio");
            route::get("/workdesk", "offers")->name("front.technician.panel.workdesk");
            route::post("/workdesk", "createArchivesProcsess")->name("front.technician.panel.workdesk.post.archive");
            route::post("/suggestion_workdesk", "createArchivesSuggest")->name("front.technician.panel.workdesk.post.suggestion.archive");
            Route::post("/workdesk/{id}", "destroy")->name("front.technician.panel.workdesk.delete.suggestion");

            route::post("/cancele/{id}", "changeStatus")->name("front.technician.panel.workdesk.changeStatus.archive.cancle");

            route::post("/factor/{id}", "factor")->name("front.technician.panel.workdesk.factor");
        });
    });

    route::prefix("userpanel")->middleware(['auth:sanctum', 'verified'])->group(function () {
        route::controller(FrontUserPanelController::class)->group(function () {
            route::get("/", "index")->name("user.panel.inedx");
            route::get("/passwordchange", "showpasschange")->name("user.panel.passchange.show");
            route::post("/passchange", "passchange")->name("user.panel.passchange.store");
            route::post("/picturechange", "picturechange")->name("user.panel.profile.pic.change");
            route::get("/editprofile", "editprofile")->name("user.panel.profile.edit");
            route::post("/updateprofile", "updateprofile")->name("user.panel.profile.update");
            route::get("/favoritetechnicians", "favorittech")->name("user.panel.profile.favorittech.show");
            route::post("/favortech/{id}", "favortech")->name("user.panel.profile.favorittech.store");
            route::get("/techinfo/{id}", "techinfo")->name("user.panel.profile.tech.info");
            // routing for ms vaghefi
            route::get("/notification", "notifications")->name("user.panel.notification");
            route::get("/transactions", "transactions")->name("user.panel.transactions");
            route::post("/cancele_transaction/{id}", "changeStatus")->name("user.panel.transactions.cancele.change_status");
            route::post("/cancele_waiting/{id}", "destroy")->name("user.panel.transactions.cancele.waiting.suggest");
        });
    });


    route::get("/", [FrontHomeController::class, "index"])->name("user.home");
    Route::prefix("articles")->group(function () {
        Route::controller(FrontArticleController::class)->group(function () {
            Route::get("/", "index")->name("front.articles.index");
            Route::get("/{id}/{slug}", "show")->name("front.article.show");
        });
    });
    Route::get("/about_us", [FrontAboutUsController::class, "index"])->name("front.about_us");
    Route::prefix("Contact_us")->group(function () {
        Route::controller(FrontContactUsController::class)->group(function () {
            Route::get("/", "index")->name("front.contact_us");
            Route::post("/store", "store")->name("front.contact_us.store");
        });
    });
    Route::get("/faq", [FrontFaqController::class, "index"])->name("front.faq.index");
    Route::get("/rules-terms", [FrontRuleController::class, "index"])->name("front.rules.index");



    route::prefix("chat")->group(function () {
        route::get("/message/{id}", [ChatController::class, "chat"])->name("user.chat.message");
        route::post("/chatstatus/{id}", [ChatController::class, "chatstatus"])->name("user.chat.status");

        route::get("/chatcheck/{id}", [ChatController::class, "chatcheck"])->name("user.chat.check");
    });

    // routes for payment
    route::prefix("payment")->group(function () {
        route::post("pay/{id}", [AdminPaymentController::class, "pay"])->name("payment.pay");
        route::post("problems/{id}", [AdminPaymentController::class, "problems"])->name("problems.store");
    });
});
route::prefix("chat")->group(function () {
    route::post("/storemessage", [ChatController::class, "store"])->name("user.chat.message.send");
    route::get("/getemessages/{id}", [ChatController::class, "getmessages"])->name("user.chat.message.get");
});
