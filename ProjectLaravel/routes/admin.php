<?php
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CatController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
Route::middleware('auth:admin')->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
});

Route::prefix('/user')->group(function () {
    Route::get('create', [UserController::class, 'create'])->name('user.create');
    Route::post('create', [UserController::class, 'store'])->name('user.add');
    Route::get('list', [UserController::class, 'show'])->name('user.list');
    Route::get('delete/{user_id}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('edit/{user_id}', [UserController::class, 'edit']);
    Route::post('edit', [UserController::class, 'update'])->name('user.update');
});

Route::prefix('/categories')->group(function() {
    Route::get('create', [CatController::class, 'create'])->name('cat.create');
    Route::post('create', [CatController::class, 'store'])->name('cat.add');
    Route::get('list', [CatController::class, 'show'])->name('cat.list');
    Route::get('delete/{cat_id}', [CatController::class, 'delete']);
});

Route::prefix('/product')->group(function() {
    Route::get('create', [ProductController::class, 'create'])->name('pd.create');
    Route::post('create', [ProductController::class, 'store'])->name('pd.add');
    Route::get('list', [ProductController::class, 'show'])->name('pd.list');
    Route::get('delete/{product_id}', [ProductController::class, 'delete']);
    Route::get('edit/{product_id}', [ProductController::class, 'edit']);
    Route::post('edit', [ProductController::class, 'update'])->name('pd.update');
});
