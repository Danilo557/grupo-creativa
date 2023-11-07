<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\Admin\CreateBrand;
use App\Http\Livewire\Admin\CreateCategory;
use App\Http\Livewire\Admin\CreateColor;
use App\Http\Livewire\Admin\CreateIdeal;
use App\Http\Livewire\Admin\CreateProduct;
use App\Http\Livewire\Admin\CreateStore;
use App\Http\Livewire\Admin\CreateUnit;
use App\Http\Livewire\Admin\UpdateBrand;
use App\Http\Livewire\Admin\UpdateCategory;
use App\Http\Livewire\Admin\UpdateColor;
use App\Http\Livewire\Admin\UpdateIdeal;
use App\Http\Livewire\Admin\UpdateProduct;
use App\Http\Livewire\Admin\UpdateRole;
use App\Http\Livewire\Admin\UpdateStore;
use App\Http\Livewire\Admin\UpdateUnit;
use Illuminate\Support\Facades\Route;





Route::group(['middleware' => [\Spatie\Permission\Middleware\RoleMiddleware::using('Admin|Customer')]], function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');



    Route::get('/units', [AdminController::class, 'units'])->name('admin.units.index');
    Route::get('/stores', [AdminController::class, 'stores'])->name('admin.stores.index');
    Route::get('/categories', [AdminController::class, 'categories'])->name('admin.categories.index');
    Route::get('/products', [AdminController::class, 'products'])->name('admin.products.index');
    Route::get('/colors', [AdminController::class, 'colors'])->name('admin.colors.index');

    Route::get('/ideals', [AdminController::class, 'ideals'])->name('admin.ideals.index');

    Route::get('/brands', [AdminController::class, 'brands'])->name('admin.brands.index');
    Route::get('/brands/{brand}/edit', UpdateBrand::class)->name('admin.brands.edit');
    Route::get('/brands/create', CreateBrand::class)->name('admin.brands.create');

    Route::get('/units/{unit}/edit', UpdateUnit::class)->name('admin.units.edit');
    Route::get('/units/create', CreateUnit::class)->name('admin.units.create');

    Route::get('/stores/{store}/edit', UpdateStore::class)->name('admin.stores.edit');
    Route::get('/stores/create', CreateStore::class)->name('admin.stores.create');

    Route::get('/categories/{category}/edit', UpdateCategory::class)->name('admin.categories.edit');
    Route::get('/categories/create', CreateCategory::class)->name('admin.categories.create');

    Route::get('/products/{product}/edit', UpdateProduct::class)->name('admin.products.edit');
    Route::get('/products/create', CreateProduct::class)->name('admin.products.create');

    Route::get('/colors/{color}/edit', UpdateColor::class)->name('admin.colors.edit');
    Route::get('/colors/create', CreateColor::class)->name('admin.colors.create');

    Route::get('/ideals/{ideal}/edit', UpdateIdeal::class)->name('admin.ideals.edit');
    Route::get('/ideals/create', CreateIdeal::class)->name('admin.ideals.create');


    Route::get('/orders', [OrderController::class, "index"])->name('admin.orders.index');
    Route::get('/orders/{order}/show/', [OrderController::class, "show"])->name('admin.orders.show');

    
});



Route::group(['middleware' => [\Spatie\Permission\Middleware\RoleMiddleware::using('Admin')]], function () {

    Route::get('/users', [UserController::class, "index"])->name('admin.users.index');
    Route::get('/users/{user}/edit', [UserController::class, "edit"])->name('admin.users.edit');
    Route::put('/users/{user}/update', [UserController::class, "update"])->name('admin.users.update');

    
    Route::get('/roles', [RoleController::class, "index"])->name('admin.roles.index');
    Route::get('/roles/create', [RoleController::class, "create"])->name('admin.roles.create');
    Route::post('/roles/store', [RoleController::class, "store"])->name('admin.roles.store');
    Route::get('/roles/{role}/edit', [RoleController::class, "edit"])->name('admin.roles.edit');
    Route::put('/roles/{role}/update', [RoleController::class, "update"])->name('admin.roles.update');
    Route::delete('/roles/{role}/destroy', [RoleController::class, "update"])->name('admin.roles.destroy');
});


Route::get('/brand-select', [AdminController::class, 'brandselect'])->name('admin.brands.select');
Route::get('/category-select', [AdminController::class, 'categoryselect'])->name('admin.category.select');
Route::get('/features-select', [AdminController::class, 'featuresselect'])->name('admin.features.select');
Route::get('/colors-select', [AdminController::class, 'colorsselect'])->name('admin.colors.select');
Route::get('/ideals-select', [AdminController::class, 'idealsselect'])->name('admin.ideals.select');
Route::get('/materials-select', [AdminController::class, 'materialsselect'])->name('admin.materials.select');
Route::get('/units-select', [AdminController::class, 'unitsselect'])->name('admin.units.select');

Route::post('products/{product}/files', [AdminController::class, 'files'])->name('admin.products.files');
