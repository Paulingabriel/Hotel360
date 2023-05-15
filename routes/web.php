<?php

use Illuminate\Support\Facades\Route;

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
    return view('accueil');
});

Route::get('/create', function () {
    return view('clients.create');
});

             /*Types de Chambres */

Route::prefix('/types-chambres')->name('typesChambres.')->group(function(){
    Route::get("/liste", [TypesChambresController::class, 'index'])->name('index');
    Route::post("/ajouter", [TypesChambresController::class, 'store'])->name('ajouter');
    Route::get("/ajouter", [TypesChambresController::class, 'create'])->name('ajouter');
    Route::get("/détails", [TypesChambresController::class, 'show'])->name('details');
    Route::post("/modifier", [TypesChambresController::class, 'update'])->name('modifier');
    Route::get("/modifier", [TypesChambresController::class, 'edit'])->name('modifier');
    Route::get("/supprimer", [TypesChambresController::class, 'delete'])->name('delete');
});


        /*Chambres */

Route::prefix('/chambres')->name('chambres/')->group(function(){
    Route::get("/liste", [ChambresController::class, 'index'])->name('index');
    Route::post("/ajouter", [ChambresController::class, 'store'])->name('ajouter');
    Route::get("/ajouter", [ChambresController::class, 'create'])->name('ajouter');
    Route::get("/détails", [ChambresController::class, 'show'])->name('details');
    Route::post("/modifier", [ChambresController::class, 'update'])->name('modifier');
    Route::get("/modifier", [ChambresController::class, 'edit'])->name('modifier');
    Route::get("/supprimer", [ChambresController::class, 'delete'])->name('delete');
});


        /*Clients*/

Route::prefix('/clients')->name('clients/')->group(function(){
    Route::get("/liste", [ChambresController::class, 'index'])->name('index');
    Route::post("/ajouter", [ChambresController::class, 'store'])->name('ajouter');
    Route::get("/ajouter", [ChambresController::class, 'create'])->name('ajouter');
    Route::get("/détails", [ChambresController::class, 'show'])->name('details');
    Route::post("/modifier", [ChambresController::class, 'update'])->name('modifier');
    Route::get("/modifier", [ChambresController::class, 'edit'])->name('modifier');
    Route::get("/supprimer", [ChambresController::class, 'delete'])->name('delete');
});        