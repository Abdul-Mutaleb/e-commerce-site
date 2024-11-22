<?php
use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductDiscountController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','rolemanager:dashboard'])->name('dashboard');


//admin routes  

Route::middleware(['auth', 'verified','rolemanager:admin'])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::controller(AdminMainController::class)->group(function () {
            route::get('/dashboard','index')->name('admin');
            route::get('/setting','setting')->name('admin.setting');
            route::get('/manage/user','manage')->name('admin.manage.user');
            route::get('/manage/store','mange_store')->name('admin.mange.store');
            route::get('/cart/history','cart_history')->name('admin.cart.history');
            route::get('/order/history','order_history')->name('admin.order.history');
        });
        Route::controller(CategoryController::class)->group(function () {
            route::get('/category/create_category','index')->name('category.create_category');
            route::get('/category/manage_category','manage')->name('category.manage');
           
        });
        Route::controller(SubCategoryController::class)->group(function () {
            route::get('/sub_category/create_sub_category','index')->name('sub_category.create_sub_category');
            route::get('/sub_category/manage_sub_category','manage')->name('sub_category.manage_sub_category');
           
        });
        Route::controller(ProductController::class)->group(function () {
            route::get('/product/manage_product_review','index')->name('product.manage_product_review');
            route::get('/product/manage_product','manage')->name('product.manage_product');
           
        });
        Route::controller(ProductAttributeController
        ::class)->group(function () {
            route::get('/product_attribute/create','index')->name('product_attribute.create');
            route::get('/product_attribute/manage','manage')->name('product_attribute.manage');
           
        });
        Route::controller(ProductDiscountController
        ::class)->group(function () {
            route::get('/discount/create_discount','index')->name('discount.create_discount');
            route::get('/discount/create_manage_discount','manage')->name('discount.create_manage_discount');
           
        });
    });
});


Route::get('/vendor/dashboard', function () {
    return view('vendor');
})->middleware(['auth', 'verified','rolemanager:vendor'])->name('vendor');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
