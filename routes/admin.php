<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    LoginController,
    SettingController,
    CategoryController,
    BrandController,
    AttributeController,
    AttributeValueController,
    ProductController,
    ProductImageController,
    ProductAttributeController,
    OrderController
};

use App\Models\{Product, Order, Brand};

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix'=>'admin'], function() {

    Route::get('login',  [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login.post');
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function(){
        Route::get('/', function () {
            $products = Product::all()->count();
            $brands = Brand::all()->count();
            $orders = Order::all()->count();
            $orders_completed = Order::where('status', 'Completed')->count();
            return view('admin.dashboard.index', compact('products','brands', 'orders', 'orders_completed'));
        })->name('admin.dashboard');

        Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings');
        Route::post('/settings', [SettingController::class, 'update'])->name('admin.settings.update');


        Route::group(['prefix' => 'categories'], function(){
            Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('admin.categories.store');
            Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
            Route::post('/update', [CategoryController::class, 'update'])->name('admin.categories.update');
            Route::get('/{id}/delete', [CategoryController::class, 'destroy'])->name('admin.categories.delete');
        });

        Route::group(['prefix' => 'brands'], function(){
            Route::get('/', [BrandController::class, 'index'])->name('admin.brands.index');
            Route::get('/create', [BrandController::class, 'create'])->name('admin.brands.create');
            Route::post('/store', [BrandController::class, 'store'])->name('admin.brands.store');
            Route::get('/{id}/edit', [BrandController::class, 'edit'])->name('admin.brands.edit');
            Route::post('/update', [BrandController::class, 'update'])->name('admin.brands.update');
            Route::get('/{id}/delete', [BrandController::class, 'destroy'])->name('admin.brands.delete');
        });
        Route::group(['prefix' => 'attributes'], function(){
            Route::get('/', [AttributeController::class, 'index'])->name('admin.attributes.index');
            Route::get('/create', [AttributeController::class, 'create'])->name('admin.attributes.create');
            Route::post('/store', [AttributeController::class, 'store'])->name('admin.attributes.store');
            Route::get('/{id}/edit', [AttributeController::class, 'edit'])->name('admin.attributes.edit');
            Route::post('/update', [AttributeController::class, 'update'])->name('admin.attributes.update');
            Route::get('/{id}/delete', [AttributeController::class, 'destroy'])->name('admin.attributes.delete');

            Route::post('/get-values', [AttributeValueController::class, 'getValues']);
            Route::post('/add-values', [AttributeValueController::class, 'addValues']);
            Route::post('/update-values', [AttributeValueController::class, 'updateValues']);
            Route::post('/delete-values', [AttributeValueController::class, 'deleteValues']);
        });

        Route::group(['prefix' => 'products'], function () {
            Route::get('/', [ProductController::class, 'index'])->name('admin.products.index');
            Route::get('/create', [ProductController::class, 'create'])->name('admin.products.create');
            Route::post('/store', [ProductController::class, 'store'])->name('admin.products.store');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
            Route::post('/update', [ProductController::class, 'update'])->name('admin.products.update');

            Route::post('images/upload', [ProductImageController::class, 'upload'])->name('admin.products.images.upload');
            Route::get('images/{id}/delete', [ProductImageController::class, 'delete'])->name('admin.products.images.delete');


            Route::get('attributes/load', [ProductAttributeController::class, 'loadAttributes']);
            Route::post('attributes', [ProductAttributeController::class, 'productAttributes']);
            Route::post('attributes/values', [ProductAttributeController::class, 'loadValues']);
            Route::post('attributes/add', [ProductAttributeController::class, 'addAttribute']);
            Route::post('attributes/delete', [ProductAttributeController::class, 'deleteAttribute']);

         });

         Route::group(['prefix' => 'orders'], function () {
            Route::get('/', [OrderController::class, 'index'])->name('admin.orders.index');
            Route::get('/{order}/show', [OrderController::class, 'show'])->name('admin.orders.show');
         });

    });



});

