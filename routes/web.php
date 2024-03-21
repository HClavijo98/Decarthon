<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\SugestionBoxController;
use App\Models\Bank_account;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Testing\Fakes\Fake;
use Laravel\Socialite\Facades\Socialite;
use Faker\Factory as FakerFactory;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class,'index'])->name('inicio');
Route::get('/logOut', [ProfileController::class,'logOut'])->name('logOut');
Route::get('/gestion', [ProfileController::class,'gestion'])->name('gestion')->middleware(['auth','role:admin']);

//gestion
Route::post('/addProduct', [ProductController::class,'create'])->name('addProduct')->middleware(['auth','role:admin']);
Route::delete('/delProduct', [ProductController::class,'destroy'])->name('delProduct')->middleware(['auth','role:admin']);
Route::put('/updateProduct', [ProductController::class,'update'])->name('updateProduct')->middleware(['auth','role:admin']);
Route::get('/addCat', [CategoryController::class,'create'])->name('addCat')->middleware(['auth','role:admin']);
Route::put('/updateCat', [CategoryController::class,'update'])->name('updateCat')->middleware(['auth','role:admin']);
Route::delete('/delCat', [CategoryController::class,'destroy'])->name('delCat')->middleware(['auth','role:admin']);
Route::get('/addBrand', [BrandController::class,'create'])->name('addBrand')->middleware(['auth','role:admin']);
Route::put('/updateBrand', [BrandController::class, 'update'])->name('updateBrand')->middleware(['auth','role:admin']);
Route::delete('/delBrand', [BrandController::class,'destroy'])->name('delBrand')->middleware(['auth','role:admin']);
Route::get('/upgradeUser', [ProfileController::class,'upgrade'])->name('upgradeUser')->middleware(['auth','role:admin']);
Route::get('/downgradeUser', [ProfileController::class,'downgrade'])->name('downgradeUser')->middleware(['auth','role:admin']);
Route::delete('/delUser', [ProfileController::class,'delete'])->name('delUser')->middleware(['auth','role:admin']);

Route::get('/getProduct/{id}', [ProductController::class,'getProduct'])->name('getProduct');
Route::get('/showProduct/{id}', [ProductController::class,'showProduct'])->name('showProduct');
Route::get('/search', [ProductController::class,'search'])->name('search');

Route::post('/addSugestion', [SugestionBoxController::class,'create'])->name('addSugestion');

Route::get('/compra/{id}', [ShoppingCartController::class,'store'])->name('compra');
Route::get('/cart/{id}', [ShoppingCartController::class,'index'])->name('cart');
Route::delete('/cart', [ShoppingCartController::class,'destroy'])->name('delCart');
Route::get('/pagar/{id}', [ShoppingCartController::class,'edit'])->name('pagar');

Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-auth/callback', function () {
    $user_google = Socialite::driver('google')->stateless()->user();
    $faker = FakerFactory::create();
    $numero_aleatorio = 'ES' . $faker->numerify('##############');
    $account = Bank_account::create(['IBAN' => $numero_aleatorio,'money' => rand(500,5000),'bank' => fake()->name()]);
    $user = User::updateOrCreate([
        'google_id' => $user_google->id,
    ], [
        'name' => $user_google->name,
        'email' => $user_google->email,
        'bank_account_id' => $account->id,
    ]);
    $user->assignRole('cliente');
    Auth::login($user);
    return redirect('/');
});

Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
