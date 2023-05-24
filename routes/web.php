<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtagesController;
use App\Http\Controllers\SallesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ChambresController;
use App\Http\Controllers\SallesPrController;
use App\Http\Controllers\SallesPsController;
use App\Http\Controllers\ResSallesController;
use App\Http\Controllers\ChambresPrController;
use App\Http\Controllers\ChambresPsController;
use App\Http\Controllers\ResChambresController;
use App\Http\Controllers\TypesSallesController;
use App\Http\Controllers\TypesChambresController;

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





/*Types de Chambres */

Route::prefix('/types-chambres')->name('typesChambres/')->group(function(){
    Route::get("/liste", [TypesChambresController::class, 'index'])->name('index');
    Route::post("/ajouter", [TypesChambresController::class, 'store'])->name('store');
    Route::get("/ajouter", [TypesChambresController::class, 'create'])->name('ajouter');
    Route::get("/détails", [TypesChambresController::class, 'show'])->name('details');
    Route::post("/modifier/{id}", [TypesChambresController::class, 'update'])->name('modifier');
    Route::get("/modifier/{id}", [TypesChambresController::class, 'edit'])->name('edit');
    Route::get("/supprimer/{id}", [TypesChambresController::class, 'destroy'])->name('delete');
});


        /*Chambres */

Route::prefix('/chambres')->name('chambres/')->group(function(){
    Route::get("/liste", [ChambresController::class, 'index'])->name('index');
    Route::post("/ajouter", [ChambresController::class, 'store'])->name('store');
    Route::get("/ajouter", [ChambresController::class, 'create'])->name('ajouter');
    Route::get("/détails", [ChambresController::class, 'show'])->name('details');
    Route::post("/modifier/{id}", [ChambresController::class, 'update'])->name('modifier');
    Route::get("/modifier/{id}", [ChambresController::class, 'edit'])->name('edit');
    Route::get("/supprimer/{id}", [ChambresController::class, 'destroy'])->name('delete');
});


/*Clients*/

Route::prefix('/clients')->name('clients/')->group(function(){
    Route::get("/liste", [ClientsController::class, 'index'])->name('index');
    Route::post("/ajouter", [ClientsController::class, 'store'])->name('store');
    Route::get("/ajouter", [ClientsController::class, 'create'])->name('ajouter');
    Route::get("/détails", [ClientsController::class, 'show'])->name('details');
    Route::post("/modifier/{id}", [ClientsController::class, 'update'])->name('modifier');
    Route::get("/modifier/{id}", [ClientsController::class, 'edit'])->name('edit');
    Route::get("/supprimer/{id}", [ClientsController::class, 'destroy'])->name('delete');
});


                                            /*Etages*/

Route::prefix('/étages')->name('etages/')->group(function(){
    Route::get("/liste", [EtagesController::class, 'index'])->name('index');
    Route::post("/ajouter", [EtagesController::class, 'store'])->name('store');
    Route::get("/ajouter", [EtagesController::class, 'create'])->name('ajouter');
    Route::get("/détails", [EtagesController::class, 'show'])->name('details');
    Route::post("/modifier/{id}", [EtagesController::class, 'update'])->name('modifier');
    Route::get("/modifier/{id}", [EtagesController::class, 'edit'])->name('edit');
    Route::get("/supprimer/{id}", [EtagesController::class, 'destroy'])->name('delete');
});


/*chambres-prix-réguliers*/

Route::prefix('/chambres-prix-réguliers')->name('chambresPr/')->group(function(){
    Route::get("/liste", [ChambresPrController::class, 'index'])->name('index');
    Route::post("/ajouter", [ChambresPrController::class, 'store'])->name('store');
    Route::get("/ajouter", [ChambresPrController::class, 'create'])->name('ajouter');
    Route::get("/détails", [ChambresPrController::class, 'show'])->name('details');
    Route::post("/modifier/{id}", [ChambresPrController::class, 'update'])->name('modifier');
    Route::get("/modifier/{id}", [ChambresPrController::class, 'edit'])->name('edit');
    Route::get("/supprimer/{id}", [ChambresPrController::class, 'destroy'])->name('delete');
});



/*chambres-prix-spéciaux*/

Route::prefix('/chambres-prix-spéciaux')->name('chambresPs/')->group(function(){
    Route::get("/liste", [ChambresPsController::class, 'index'])->name('index');
    Route::post("/ajouter", [ChambresPsController::class, 'store'])->name('store');
    Route::get("/ajouter", [ChambresPsController::class, 'create'])->name('ajouter');
    Route::get("/détails", [ChambresPsController::class, 'show'])->name('details');
    Route::post("/modifier/{id}", [ChambresPsController::class, 'update'])->name('modifier');
    Route::get("/modifier/{id}", [ChambresPsController::class, 'edit'])->name('edit');
    Route::get("/supprimer/{id}", [ChambresPsController::class, 'destroy'])->name('delete');
});


/*salles*/

Route::prefix('/salles')->name('salles/')->group(function(){
    Route::get("/liste", [SallesController::class, 'index'])->name('index');
    Route::post("/ajouter", [SallesController::class, 'store'])->name('store');
    Route::get("/ajouter", [SallesController::class, 'create'])->name('ajouter');
    Route::get("/détails", [SallesController::class, 'show'])->name('details');
    Route::post("/modifier/{id}", [SallesController::class, 'update'])->name('modifier');
    Route::get("/modifier/{id}", [SallesController::class, 'edit'])->name('edit');
    Route::get("/supprimer/{id}", [SallesController::class, 'destroy'])->name('delete');
});


/*salles-prix-réguliers*/

Route::prefix('/salles-prix-réguliers')->name('sallesPr/')->group(function(){
    Route::get("/liste", [SallesPrController::class, 'index'])->name('index');
    Route::post("/ajouter", [SallesPrController::class, 'store'])->name('store');
    Route::get("/ajouter", [SallesPrController::class, 'create'])->name('ajouter');
    Route::get("/détails", [SallesPrController::class, 'show'])->name('details');
    Route::post("/modifier/{id}", [SallesPrController::class, 'update'])->name('modifier');
    Route::get("/modifier/{id}", [SallesPrController::class, 'edit'])->name('edit');
    Route::get("/supprimer/{id}", [SallesPrController::class, 'destroy'])->name('delete');
});


/*salles-prix-spéciaux*/

Route::prefix('/salles-prix-spéciaux')->name('sallesPs/')->group(function(){
    Route::get("/liste", [SallesPsController::class, 'index'])->name('index');
    Route::post("/ajouter", [SallesPsController::class, 'store'])->name('store');
    Route::get("/ajouter", [SallesPsController::class, 'create'])->name('ajouter');
    Route::get("/détails", [SallesPsController::class, 'show'])->name('details');
    Route::post("/modifier/{id}", [SallesPsController::class, 'update'])->name('modifier');
    Route::get("/modifier/{id}", [SallesPsController::class, 'edit'])->name('edit');
    Route::get("/supprimer/{id}", [SallesPsController::class, 'destroy'])->name('delete');
});



/*typesSalles*/

Route::prefix('/types-salles')->name('typesSalles/')->group(function(){
    Route::get("/liste", [TypesSallesController::class, 'index'])->name('index');
    Route::post("/ajouter", [TypesSallesController::class, 'store'])->name('store');
    Route::get("/ajouter", [TypesSallesController::class, 'create'])->name('ajouter');
    Route::get("/détails", [TypesSallesController::class, 'show'])->name('details');
    Route::post("/modifier/{id}", [TypesSallesController::class, 'update'])->name('modifier');
    Route::get("/modifier/{id}", [TypesSallesController::class, 'edit'])->name('edit');
    Route::get("/supprimer/{id}", [TypesSallesController::class, 'destroy'])->name('delete');
});


/*reservations-Salles*/

Route::prefix('/reservations-salles')->name('resSalles/')->group(function(){
    Route::get("/liste", [ResSallesController::class, 'index'])->name('index');
    Route::post("/ajouter", [ResSallesController::class, 'store'])->name('store');
    Route::get("/ajouter", [ResSallesController::class, 'create'])->name('ajouter');
    Route::get("/détails", [ResSallesController::class, 'show'])->name('details');
    Route::post("/modifier", [ResSallesController::class, 'update'])->name('modifier');
    Route::get("/modifier", [ResSallesController::class, 'edit'])->name('edit');
    Route::get("/supprimer", [ResSallesController::class, 'delete'])->name('delete');
});

/*reservations-Chambres*/

Route::prefix('/reservations-chambres')->name('resChambres/')->group(function(){
    Route::get("/liste", [ResChambresController::class, 'index'])->name('index');
    Route::post("/ajouter", [ResChambresController::class, 'store'])->name('store');
    Route::get("/ajouter", [ResChambresController::class, 'create'])->name('ajouter');
    Route::get("/détails", [ResChambresController::class, 'show'])->name('details');
    Route::post("/modifier", [ResChambresController::class, 'update'])->name('modifier');
    Route::get("/modifier", [ResChambresController::class, 'edit'])->name('edit');
    Route::get("/supprimer", [ResChambresController::class, 'delete'])->name('delete');
});
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/accueil', [App\Http\Controllers\HomeController::class, 'index'])->name('accueil');
