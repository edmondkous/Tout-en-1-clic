<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;



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

Route::get('/', function () {
    return view('welcome');

});

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/registerClient', [AuthController::class, 'registerClient'])->name('registerClient');

Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
Route::post('/registerPostClient', [AuthController::class, 'registerPostClient'])->name('registerPostClient');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');

// Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
// Route::get('/index', [AuthController::class, 'index'])->name('index.users');
// Route::get('/delete/{user}', [AuthController::class, 'delete'])->name('delete.users');
// Route::get('/edit/{user}',[AuthController::class, 'edit'])->name('user.edit');
// Route::get('/update/{user}',[AuthController::class, 'update'])->name('user.update');



Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/client-dashboard', [DashboardController::class, 'indexClient'])->name('client_dashboard');


Route::prefix('categories')->group(function(){
    Route::get('/',[CategorieController::class, 'index'])->name('categories.index');
    Route::get('/create',[CategorieController::class, 'create'])->name('categories.create');
    // Route::get('/',[CategorieController::class, 'index'])->name('categories.index');
    Route::post('/create',[CategorieController::class, 'store'])->name('categories.store');
    Route::get('/delete/{categorie}',[CategorieController::class, 'delete'])->name('categories.delete');
    Route::get('/edit/{categorie}',[CategorieController::class, 'edit'])->name('categories.edit');
    Route::get('/update/{categorie}',[CategorieController::class, 'update'])->name('categories.update');
    // Route::get('/viewBycategory',[CategorieController::class, 'viewcategorie'])->name('shops.viewBycategory');

    // Route::get('/generate-qrcode/{id}', [CategorieController::class, 'generateQRCode'])->name('generate.qrcode');

});

Route::prefix('marques')->group(function(){
    Route::get('/',[MarqueController::class, 'index'])->name('marques.index');
    Route::get('/create',[MarqueController::class, 'create'])->name('marques.create');
    // Route::get('/',[MarqueController::class, 'index'])->name('marques.index');
    Route::post('/create',[MarqueController::class, 'store'])->name('marques.store');
    Route::get('/delete/{marque}',[MarqueController::class, 'delete'])->name('marques.delete');
    Route::get('/edit/{marque}',[MarqueController::class, 'edit'])->name('marques.edit');
    Route::get('/update/{marque}',[MarqueController::class, 'update'])->name('marques.update');


});

Route::prefix('produits')->group(function(){
    Route::get('/index',[ProduitController::class, 'index'])->name('index.produits');
    Route::get('/create',[ProduitController::class, 'create'])->name('produits.create');
    Route::post('/create',[ProduitController::class, 'store'])->name('produits.store');
    Route::get('/delete/{produit}',[ProduitController::class, 'delete'])->name('produits.delete');
    Route::get('/edit/{produit}',[ProduitController::class, 'edit'])->name('produits.edit');
    Route::get('/update/{produit}',[ProduitController::class, 'update'])->name('produits.update');
});
Route::get('/',[ProduitController::class, 'pageShop'])->name('shops.pageShop');
Route::get('/boutique',[ProduitController::class, 'boutique'])->name('shops.boutique');
Route::get('/detailShop/{id}',[ProduitController::class, 'detailShop'])->name('shops.detailShop');
Route::get('/viewBycategory/{id}', [ProduitController::class,'viewBycategory'])->name('shops.viewBycategory');
Route::get('/produits', [ProduitController::class, 'filtrePrix'])->name('shops.filtrePrix');

// Route::get('search', [ProduitController::class, 'index'])->name('search');
// Route::get('autocomplete', [ProduitController::class, 'autocomplete'])->name('autocomplete');





Route::middleware(['auth'])->group(function () {
    //panier route
    Route::get('/panier',[CartController::class, 'index'])->name('cart.index'); //Methode pour afficher le contenu du panier
    Route::post('/store',[CartController::class, 'store'])->name('cart.store');
    Route::delete('/destroy/{rowId}',[CartController::class, 'destroy'])->name('cart.destroy'); //Methode pour ajouter un produit au panier
    Route::put('/update',[CartController::class, 'update'])->name('cart.update');

    // route pour increment et decrement quantity
    Route::post('/cart/increment/{rowId}',[CartController::class, 'increment'])->name('cart.increment');
    Route::post('/cart/decrement/{rowId}', [CartController::class, 'decrement'])->name('cart.decrement');

    Route::get('/videpanier', function(){
        Cart::destroy();
    });
    Route::get('/videpanier', function(){
        Cart::destroy();
    });
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
});
    //order by status and all
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/success', [OrderController::class, 'success'])->name('orders.termine');
    Route::get('/pending', [OrderController::class, 'pending'])->name('orders.attente');
    Route::get('/cancel', [OrderController::class, 'cancel'])->name('orders.annule');

    // change status route
    Route::put('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');


