<?php

use App\Http\Controllers\backend\ParcelTransferController;
use Illuminate\Support\Facades\Route;

Route::get('/clear', function() {   
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('logs:clear');
    return 'View cache has been cleared';
});


Route::get('/',function(){return redirect()->route('admin.login');});

//Item Module Routes
Route::namespace('App\Http\Controllers\backend\items')->group(function(){
    Route::prefix('backend/items')->middleware('admin')->group(function (){
        Route::prefix('categories')->controller(CategoryController::class)->group(function(){
            Route::get('','index')->name('categories.index');
            Route::get('create','createOrEdit')->name('categories.create');
            Route::get('edit/{id?}','createOrEdit')->name('categories.edit');
            Route::post('store','store')->name('categories.store');
            Route::put('update/{id}','update')->name('categories.update');
            Route::delete('delete/{id}','destroy')->name('categories.destroy');
        });
        Route::prefix('sub-categories')->controller(SubCategoryController::class)->group(function(){
            Route::get('','index')->name('sub-categories.index');
            Route::get('create','createOrEdit')->name('sub-categories.create');
            Route::get('edit/{id?}','createOrEdit')->name('sub-categories.edit');
            Route::post('store','store')->name('sub-categories.store');
            Route::put('update/{id}','update')->name('sub-categories.update');
            Route::delete('delete/{id}','destroy')->name('sub-categories.destroy');
        });

    });
});

Route::prefix('vendor')->group(function () {
    Route::namespace('App\Http\Controllers\backend')->group(function(){
        Route::prefix('login')->controller(UserController::class)->group(function(){
            Route::match(['get', 'post'],'', 'login')->name('admin.login');
        });
        Route::middleware('admin')->group(function (){


            Route::prefix('vendors')->controller(VendorController::class)->group(function(){
                Route::get('','index')->name('vendors.index');
                Route::get('create','createOrEdit')->name('vendors.create');
                Route::get('edit/{id?}','createOrEdit')->name('vendors.edit');
                Route::post('store','store')->name('vendors.store');
                Route::put('update/{id}','update')->name('vendors.update');
                Route::delete('delete/{id}','destroy')->name('vendors.destroy');
                Route::get('list','list')->name('vendors.list');
            });


            Route::prefix('customer-payments')->controller(CustomerPaymentController::class)->group(function(){
                Route::get('','index')->name('customer-payments.index');
                Route::get('create','createOrEdit')->name('customer-payments.create');
                Route::post('store','store')->name('customer-payments.store');
                Route::post('due/invoice','dueInvoice')->name('customer-payments.due.invoice');
                Route::get('list','list')->name('customer-payments.list');
                Route::get('approve/{id}','approve')->name('customer-payments.approve');
                Route::delete('delete/{id}','destroy')->name('customer-payments.destroy');
            });

            Route::prefix('customers')->controller(CustomerController::class)->group(function(){
                Route::get('','index')->name('customers.index');
                Route::post('store','store')->name('customers.store');
                Route::put('update/{id}','update')->name('customers.update');
                Route::get('create','createOrEdit')->name('customers.create');
                Route::get('edit/{id?}','createOrEdit')->name('customers.edit');
                Route::delete('delete/{id}','destroy')->name('customers.destroy');
            });


            Route::prefix('payment-methods')->controller(PaymentMethodController::class)->group(function(){
                Route::get('','index')->name('payment-methods.index');
                Route::get('create','createOrEdit')->name('payment-methods.create');
                Route::get('edit/{id?}','createOrEdit')->name('payment-methods.edit');
                Route::post('store','store')->name('payment-methods.store');
                Route::put('update/{id}','update')->name('payment-methods.update');
                Route::delete('delete/{id}','destroy')->name('payment-methods.destroy');
                Route::get('list','list')->name('payment-methods.list');
            });

           
            Route::prefix('menus')->group(function(){
                Route::prefix('vendors')->controller(VendorMenuController::class)->group(function(){
                    Route::get('','index')->name('menus.vendors.index');
                    Route::get('create','createOrEdit')->name('menus.vendors.create');
                    Route::get('edit/{id?}/{addmenu?}','createOrEdit')->name('menus.vendors.edit');
                    Route::post('store','store')->name('menus.vendors.store'); 
                    Route::put('update/{id}','update')->name('menus.vendors.update');
                    Route::delete('delete/{id}','destroy')->name('menus.vendors.destroy');
                });
                Route::prefix('admins')->controller(MenuController::class)->group(function(){
                    Route::get('','index')->name('menus.admins.index');
                    Route::get('create','createOrEdit')->name('menus.admins.create');
                    Route::get('edit/{id?}/{addmenu?}','createOrEdit')->name('menus.admins.edit');
                    Route::post('store','store')->name('menus.admins.store'); 
                    Route::put('update/{id}','update')->name('menus.admins.update');
                    Route::delete('delete/{id}','destroy')->name('menus.admins.destroy');
                });
                Route::prefix('frontend')->controller(FrontendMenuController::class)->group(function(){
                    Route::get('','index')->name('menus.frontend.index');
                    Route::get('create','createOrEdit')->name('menus.frontend.create');
                    Route::get('edit/{id?}/{addmenu?}','createOrEdit')->name('menus.frontend.edit');
                    Route::post('store','store')->name('menus.frontend.store'); 
                    Route::put('update/{id}','update')->name('menus.frontend.update');
                    Route::delete('delete/{id}','destroy')->name('menus.frontend.destroy');
                });
            });

            
            Route::prefix('logout')->controller(UserController::class)->group(function(){
                Route::post('', 'logout')->name('admin.logout');
            });
            Route::prefix('dashboard')->controller(DashboardController::class)->group(function(){
                Route::get('','index')->name('dashboard.index');
                Route::get('summery-data/{dateRange?}','summeryData')->name('dashboard.summery-data');
            });
            Route::prefix('vendor-basic-infos')->controller(VendorBasicInfoController::class)->group(function(){
                Route::get('','index')->name('vendor-basic-infos.index');
                Route::put('update/{id}','update')->name('vendor-basic-infos.update');
                Route::get('edit/{id?}','edit')->name('vendor-basic-infos.edit');
            });
            Route::prefix('user')->group(function(){
                
                Route::prefix('users')->controller(UserController::class)->group(function(){
                    Route::get('','index')->name('users.index');
                    Route::get('create','createOrEdit')->name('users.create');
                    Route::get('edit/{id?}','createOrEdit')->name('users.edit');
                    Route::post('store','store')->name('users.store');
                    Route::put('update/{id}','update')->name('users.update');
                    Route::delete('delete/{id}','destroy')->name('users.destroy');
                    Route::get('all-users','allAdmins')->name('users.all-users');
                });
                Route::prefix('roles')->controller(VendorRoleController::class)->group(function(){
                    Route::get('','index')->name('roles.index');
                    Route::get('create','createOrEdit')->name('roles.create');
                    Route::get('edit/{id?}','createOrEdit')->name('roles.edit');
                    Route::post('store','store')->name('roles.store');
                    Route::put('update/{id}','update')->name('roles.update');
                    Route::delete('delete/{id}','destroy')->name('roles.destroy');
                    Route::get('all-roles','allRoles')->name('roles.all-roles');
                });
            });
            Route::prefix('password')->controller(UserController::class)->group(function(){
                Route::match(['get', 'post'],'update/{id?}','updatePassword')->name('user.password.update');
                Route::post('check-password','checkPassword')->name('user.password.check');
            });
            Route::prefix('profile')->controller(UserController::class)->group(function(){
                Route::match(['get', 'post'],'update-details/{id?}','updateDetails')->name('profile.update-details');;
            });
        });
    });
});


require __DIR__.'/auth.php';
