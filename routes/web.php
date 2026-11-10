<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Models\Menu;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Beranda
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $menus = Menu::latest()->get();

    return view('welcome', compact('menus'));
})->name('home');

/*
|--------------------------------------------------------------------------
| Menu
|--------------------------------------------------------------------------
*/

Route::resource('menus', MenuController::class);

/*
|--------------------------------------------------------------------------
| Customisasi Bakso
|--------------------------------------------------------------------------
*/

Route::get('/menus/{menu}/customize', [
    CartController::class,
    'customize'
])->name('menus.customize');

/*
|--------------------------------------------------------------------------
| Keranjang dan Checkout - Bisa Diakses Tanpa Login
|--------------------------------------------------------------------------
*/

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::post('/cart/add/{menu}', [CartController::class, 'add'])
    ->name('cart.add');

Route::post('/cart/add-customized', [
    CartController::class,
    'addCustomized'
])->name('cart.add-customized');

Route::patch('/cart/update/{id}', [CartController::class, 'update'])
    ->name('cart.update');

Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])
    ->name('cart.remove');

Route::delete('/cart/clear', [CartController::class, 'clear'])
    ->name('cart.clear');

Route::get('/checkout', [OrderController::class, 'checkout'])
    ->name('cart.checkout');

Route::post('/checkout', [OrderController::class, 'store'])
    ->name('checkout.store');

/*
|--------------------------------------------------------------------------
| Dashboard dan Fitur Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('dashboard');

    Route::get('/admin/orders', [OrderController::class, 'adminOrders'])
        ->name('admin.orders');
});

/*
|--------------------------------------------------------------------------
| Profile - Membutuhkan Login
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
