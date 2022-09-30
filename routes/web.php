<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactManagerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewManagerController;
use App\Http\Controllers\Admin\OrderManagerController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\UserManagerController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\NewsController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\UserController;
use App\Http\Services\ProductService;
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

Route::prefix('trang-chu')->group(function () {
    Route::get('/dang-nhap', [UserController::class, 'login'])->name('login');
    Route::post('/dang-nhap', [UserController::class, 'store']);
    Route::get('/dang-ki', [UserController::class, 'register_show'])->name('register');
    Route::post('/dang-ki', [UserController::class, 'register']);

    Route::get('/dich-vu', [HomeController::class, 'service']);

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('san-pham/ten-san-pham', [HomeController::class, 'searchHome'])->name('searchHome');
    Route::get('/logout', [UserController::class, 'logout'])->name('logoutUser');

    Route::get('san-pham', [ProductController::class, 'getAll']);
    Route::get('danh-muc/{id}-{slug}', [ProductController::class, 'getProductId']);
    Route::get('san-pham/{id}-{slug}', [ProductController::class, 'getDetail']);


    Route::get('tin-tuc', [NewsController::class, 'getAll']);
    Route::get('tin-tuc/{id}-{slug}', [NewsController::class, 'getDetail']);

    Route::get('lien-he', [ContactController::class, 'index']);
    Route::post('lien-he', [ContactController::class, 'contact'])->name('contact');

    Route::get('gio-hang', [OrderController::class, 'Cart']);
    Route::get('gio-hang/{id}', [OrderController::class, 'addToCart']);
    Route::get('/thanh-toan', [OrderController::class, 'checkout']);
    Route::post('/thanh-toan', [OrderController::class, 'storeCheckout']);
    Route::get('/thanh-toan/thanh-cong', [OrderController::class, 'successNoti'])->name('success-checkout');
    Route::patch('/update-cart', [OrderController::class, 'updateCart']);
    Route::delete('/remove-from-cart', [OrderController::class, 'removeCart']);
    // Route::post('huyOrder/{order}', [OrderController::class, 'huyOrder'])->name('huyOrder');

    Route::prefix('tai-khoan')->group(function () {
        Route::get('/', [UserController::class, 'home'])->name('managerHome');
        Route::get('lich-su-mua-hang', [UserController::class, 'orderManager'])->name('orderManager');
        Route::get('chi-tiet-don-hang/{order}', [UserController::class, 'getDetailOrderUser']);
    });
});
Route::get('/quan-li/dang-nhap', [AdminController::class, 'login'])->name('login');
Route::post('/quan-li/dang-nhap', [AdminController::class, 'store']);
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dang-xuat', [AdminController::class, 'logout'])->name('logout');
    Route::prefix('quan-li')->group(function () {
        Route::get('trang-chu', [DashboardController::class, 'index'])->name('admin');
        Route::get('changeActiveContacts', [DashboardController::class, 'changeActiveContacts'])->name('changeActiveContacts');
        Route::prefix('danh-muc')->group(function () {
            Route::post('them-moi', [CategoryController::class, 'store'])->name('saveCate');
            Route::get('danh-sach', [CategoryController::class, 'index']);
            Route::post('cap-nhat/{category}', [CategoryController::class, 'update'])->name('updateCate');
            Route::get('changeStatusCate', [CategoryController::class, 'changeStatus'])->name('changeStatusCate');
        });

        Route::prefix('san-pham')->group(function () {
            Route::get('changeActive', [ProductAdminController::class, 'changeActive'])->name('changeActive');
            Route::get('them-moi', [ProductAdminController::class, 'create']);
            Route::post('them-moi', [ProductAdminController::class, 'store'])->name('saveProduct');
            Route::get('danh-sach', [ProductAdminController::class, 'index'])->name('productManager');
            Route::get('san-pham-bi-an', [ProductAdminController::class, 'productHide'])->name('productHide');
            Route::get('/danh-sach/ten-san-pham', [ProductAdminController::class, 'searchName'])->name('simple_search');
            Route::get('cap-nhat/{product}', [ProductAdminController::class, 'show']);
            Route::post('cap-nhat/{product}', [ProductAdminController::class, 'update']);
        });
        Route::prefix('don-hang')->group(function () {
            Route::get('add', [OrderManagerController::class, 'create']);
            Route::post('add', [OrderManagerController::class, 'store']);
            Route::get('danh-sach', [OrderManagerController::class, 'index']);
            Route::post('cap-nhat/{order}', [OrderManagerController::class, 'updateMain'])->name('updateOrder');
            Route::get('changeStatus', [OrderManagerController::class, 'updateStatus'])->name('changeStatus');
            Route::get('chi-tiet-don-hang/{order}', [OrderManagerController::class, 'getDetailOrder']);
        });
        Route::prefix('tin-tuc')->group(function () {
            Route::get('changeActiveNew', [NewManagerController::class, 'changeActiveNew'])->name('changeActiveNew');
            Route::get('them-moi', [NewManagerController::class, 'create']);
            Route::post('them-moi', [NewManagerController::class, 'store'])->name('saveNew');
            Route::get('danh-sach', [NewManagerController::class, 'index']);
            Route::get('cap-nhat/{new}', [NewManagerController::class, 'show']);
            Route::post('cap-nhat/{new}', [NewManagerController::class, 'update']);
        });
        Route::prefix('quang-cao')->group(function () {
            Route::get('changeStatusBanner', [BannerController::class, 'changeStatusBanner'])->name('changeStatusBanner');
            Route::get('them-moi', [BannerController::class, 'create']);
            Route::post('them-moi', [BannerController::class, 'store']);
            Route::get('danh-sach', [BannerController::class, 'index'])->name('indexBanner');
            Route::get('cap-nhat/{banner}', [BannerController::class, 'show']);
            Route::post('cap-nhat/{banner}', [BannerController::class, 'update']);
            Route::get('xoa/{id}', [BannerController::class, 'delete'])->name('deleteBanner');
        });
        Route::prefix('lien-he')->group(function () {
            Route::get('danh-sach', [ContactManagerController::class, 'getAll']);
            Route::get('changeActiveContact', [ContactManagerController::class, 'changeActiveContact'])->name('changeActiveContact');
        });
        Route::prefix('nguoi-dung')->group(function () {
            Route::get('danh-sach', [UserManagerController::class, 'index']);
            Route::get('changeActiveUserAdmin', [UserManagerController::class, 'changeActiveUserAdmin'])->name('changeActiveUserAdmin');
        });
    });
});
