<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\EtagesController;
use App\Http\Controllers\SallesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ChambresController;
use App\Http\Controllers\SallesPrController;
use App\Http\Controllers\SallesPsController;
use App\Http\Controllers\ResSallesController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ChambresPrController;
use App\Http\Controllers\ChambresPsController;
use App\Http\Controllers\ResChambresController;
use App\Http\Controllers\TypesSallesController;
use App\Http\Controllers\TypesChambresController;
use App\Http\Controllers\Admin\PermissionController;

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
    Route::get("/ajouter", [TypesChambresController::class, 'create'])->name('ajouter')->middleware(['role:superadmin|admin|manager']);
    Route::get("/détails", [TypesChambresController::class, 'show'])->name('details');
    Route::post("/modifier/{id}", [TypesChambresController::class, 'update'])->name('modifier');
    Route::get("/modifier/{id}", [TypesChambresController::class, 'edit'])->name('edit')->middleware(['role:superadmin|admin|manager']);
    Route::get("/supprimer/{id}", [TypesChambresController::class, 'destroy'])->name('delete')->middleware(['role:superadmin|admin|manager']);
});


        /*Chambres */

Route::prefix('/chambres')->name('chambres/')->group(function(){
    Route::get("/liste", [ChambresController::class, 'index'])->name('index');
    Route::post("/ajouter", [ChambresController::class, 'store'])->name('store');
    Route::get("/ajouter", [ChambresController::class, 'create'])->name('ajouter')->middleware(['role:superadmin|admin|manager']);
    Route::get("/détails", [ChambresController::class, 'show'])->name('details');
    Route::post("/modifier/{id}", [ChambresController::class, 'update'])->name('modifier');
    Route::get("/modifier/{id}", [ChambresController::class, 'edit'])->name('edit')->middleware(['role:superadmin|admin|manager']);
    Route::get("/supprimer/{id}", [ChambresController::class, 'destroy'])->name('delete')->middleware(['role:superadmin|admin|manager']);
});


/*Clients*/

Route::prefix('/clients')->name('clients/')->group(function(){
    Route::get("/liste", [ClientsController::class, 'index'])->name('index');
    Route::post("/ajouter", [ClientsController::class, 'store'])->name('store');
    Route::get("/ajouter", [ClientsController::class, 'create'])->name('ajouter')->middleware(['role:superadmin|admin|manager']);
    Route::get("/détails", [ClientsController::class, 'show'])->name('details');
    Route::post("/modifier/{id}", [ClientsController::class, 'update'])->name('modifier');
    Route::get("/modifier/{id}", [ClientsController::class, 'edit'])->name('edit')->middleware(['role:superadmin|admin|manager']);
    Route::get("/supprimer/{id}", [ClientsController::class, 'destroy'])->name('delete')->middleware(['role:superadmin|admin|manager']);
});


                                            /*Etages*/

Route::prefix('/étages')->name('etages/')->group(function(){
    Route::get("/liste", [EtagesController::class, 'index'])->name('index');
    Route::post("/ajouter", [EtagesController::class, 'store'])->name('store');
    Route::get("/ajouter", [EtagesController::class, 'create'])->name('ajouter')->middleware(['role:superadmin|admin|manager']);
    Route::get("/détails", [EtagesController::class, 'show'])->name('details');
    Route::post("/modifier/{id}", [EtagesController::class, 'update'])->name('modifier');
    Route::get("/modifier/{id}", [EtagesController::class, 'edit'])->name('edit')->middleware(['role:superadmin|admin|manager']);
    Route::get("/supprimer/{id}", [EtagesController::class, 'destroy'])->name('delete')->middleware(['role:superadmin|admin|manager']);
});


/*chambres-prix-réguliers*/

Route::prefix('/chambres-prix-réguliers')->name('chambresPr/')->group(function(){
    Route::get("/liste", [ChambresPrController::class, 'index'])->name('index');
    Route::post("/ajouter", [ChambresPrController::class, 'store'])->name('store');
    Route::get("/ajouter", [ChambresPrController::class, 'create'])->name('ajouter')->middleware(['role:superadmin|admin|manager']);
    Route::get("/détails", [ChambresPrController::class, 'show'])->name('details');
    Route::post("/modifier/{id}", [ChambresPrController::class, 'update'])->name('modifier');
    Route::get("/modifier/{id}", [ChambresPrController::class, 'edit'])->name('edit')->middleware(['role:superadmin|admin|manager']);
    Route::get("/supprimer/{id}", [ChambresPrController::class, 'destroy'])->name('delete')->middleware(['role:superadmin|admin|manager']);
});



/*chambres-prix-spéciaux*/

Route::prefix('/chambres-prix-spéciaux')->name('chambresPs/')->group(function(){
    Route::get("/liste", [ChambresPsController::class, 'index'])->name('index');
    Route::post("/ajouter", [ChambresPsController::class, 'store'])->name('store');
    Route::get("/ajouter", [ChambresPsController::class, 'create'])->name('ajouter')->middleware(['role:superadmin|admin|manager']);
    Route::get("/détails", [ChambresPsController::class, 'show'])->name('details');
    Route::post("/modifier/{id}", [ChambresPsController::class, 'update'])->name('modifier');
    Route::get("/modifier/{id}", [ChambresPsController::class, 'edit'])->name('edit')->middleware(['role:superadmin|admin|manager']);
    Route::get("/supprimer/{id}", [ChambresPsController::class, 'destroy'])->name('delete')->middleware(['role:superadmin|admin|manager']);
});


/*salles*/

Route::prefix('/salles')->name('salles/')->group(function(){
    Route::get("/liste", [SallesController::class, 'index'])->name('index');
    Route::post("/ajouter", [SallesController::class, 'store'])->name('store');
    Route::get("/ajouter", [SallesController::class, 'create'])->name('ajouter')->middleware(['role:superadmin|admin|manager']);
    Route::get("/détails", [SallesController::class, 'show'])->name('details');
    Route::post("/modifier/{id}", [SallesController::class, 'update'])->name('modifier');
    Route::get("/modifier/{id}", [SallesController::class, 'edit'])->name('edit')->middleware(['role:superadmin|admin|manager']);
    Route::get("/supprimer/{id}", [SallesController::class, 'destroy'])->name('delete')->middleware(['role:superadmin|admin|manager']);
});


/*salles-prix-réguliers*/

Route::prefix('/salles-prix-réguliers')->name('sallesPr/')->group(function(){
    Route::get("/liste", [SallesPrController::class, 'index'])->name('index');
    Route::post("/ajouter", [SallesPrController::class, 'store'])->name('store');
    Route::get("/ajouter", [SallesPrController::class, 'create'])->name('ajouter')->middleware(['role:superadmin|admin|manager']);
    Route::get("/détails", [SallesPrController::class, 'show'])->name('details');
    Route::post("/modifier/{id}", [SallesPrController::class, 'update'])->name('modifier');
    Route::get("/modifier/{id}", [SallesPrController::class, 'edit'])->name('edit')->middleware(['role:superadmin|admin|manager']);
    Route::get("/supprimer/{id}", [SallesPrController::class, 'destroy'])->name('delete')->middleware(['role:superadmin|admin|manager']);
});


/*salles-prix-spéciaux*/

Route::prefix('/salles-prix-spéciaux')->name('sallesPs/')->group(function(){
    Route::get("/liste", [SallesPsController::class, 'index'])->name('index');
    Route::post("/ajouter", [SallesPsController::class, 'store'])->name('store');
    Route::get("/ajouter", [SallesPsController::class, 'create'])->name('ajouter')->middleware(['role:superadmin|admin|manager']);
    Route::get("/détails", [SallesPsController::class, 'show'])->name('details');
    Route::post("/modifier/{id}", [SallesPsController::class, 'update'])->name('modifier');
    Route::get("/modifier/{id}", [SallesPsController::class, 'edit'])->name('edit')->middleware(['role:superadmin|admin|manager']);
    Route::get("/supprimer/{id}", [SallesPsController::class, 'destroy'])->name('delete')->middleware(['role:superadmin|admin|manager']);
});



/*typesSalles*/

Route::prefix('/types-salles')->name('typesSalles/')->group(function(){
    Route::get("/liste", [TypesSallesController::class, 'index'])->name('index');
    Route::post("/ajouter", [TypesSallesController::class, 'store'])->name('store');
    Route::get("/ajouter", [TypesSallesController::class, 'create'])->name('ajouter')->middleware(['role:superadmin|admin|manager']);
    Route::get("/détails", [TypesSallesController::class, 'show'])->name('details');
    Route::post("/modifier/{id}", [TypesSallesController::class, 'update'])->name('modifier');
    Route::get("/modifier/{id}", [TypesSallesController::class, 'edit'])->name('edit')->middleware(['role:superadmin|admin|manager']);
    Route::get("/supprimer/{id}", [TypesSallesController::class, 'destroy'])->name('delete')->middleware(['role:superadmin|admin|manager']);
});


/*reservations-Salles*/

Route::prefix('/reservations-salles')->name('resSalles/')->group(function(){
    Route::get("/liste", [ResSallesController::class, 'index'])->name('index');
    Route::get("/allData", [ResSallesController::class, 'allData'])->name('allData');
    Route::post("/store", [ResSallesController::class, 'storeData'])->name('store');
    Route::get("/ajouter", [ResSallesController::class, 'create'])->name('ajouter');
    Route::get("/facture/{id}", [ResSallesController::class, 'showData'])->name('details');
    Route::get("/facture/{id}/telecharger", [ResSallesController::class, 'download'])->name('facture');
    Route::post("/update/{id}", [ResSallesController::class, 'updateData'])->name('modifier');
    Route::get("/edit/{id}", [ResSallesController::class, 'editData'])->name('edit');
    Route::get("/supprimer/{id}", [ResSallesController::class, 'deleteData'])->name('delete');
});

/*reservations-Chambres*/

Route::prefix('/reservations-chambres')->name('resChambres/')->group(function(){
    Route::get("/liste", [ResChambresController::class, 'index'])->name('index');
    Route::get("/allData", [ResChambresController::class, 'allData'])->name('allData');
    Route::post("/store", [ResChambresController::class, 'storeData'])->name('store');
    Route::get("/ajouter", [ResChambresController::class, 'create'])->name('ajouter');
    Route::get("/facture/{id}", [ResChambresController::class, 'showData'])->name('details');
    Route::get("/facture/{id}/telecharger", [ResChambresController::class, 'download'])->name('facture');
    Route::post("/update/{id}", [ResChambresController::class, 'updateData'])->name('modifier');
    Route::get("/edit/{id}", [ResChambresController::class, 'editData'])->name('edit');
    Route::get("/supprimer/{id}", [ResChambresController::class, 'deleteData'])->name('delete');
});

/*prametres hotel*/

Route::middleware(['auth', 'role:superadmin'])->prefix('/hotels')->name('hotels/')->group(function(){
    Route::get("/liste", [HotelController::class, 'index'])->name('index');
    Route::post("/ajouter", [HotelController::class, 'store'])->name('store');
    Route::get("/ajouter", [HotelController::class, 'create'])->name('ajouter');
    Route::get("/détails", [HotelController::class, 'show'])->name('details');
    Route::post("/modifier/{id}", [HotelController::class, 'update'])->name('modifier');
    Route::get("/modifier/{id}", [HotelController::class, 'edit'])->name('edit');
    Route::get("/supprimer/{id}", [HotelController::class, 'destroy'])->name('delete');
});
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/accueil', [App\Http\Controllers\HomeController::class, 'index'])->name('accueil');


Route::name('superadmin.')->prefix('superadmin')->group(function () {
    // Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::get('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::get('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
    Route::post('/utilisateurs/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/utilisateurs', [UserController::class, 'index'])->name('users.index');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::get('/utilisateurs/modifier/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::get('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::get('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
});


/*Auth*/

Route::prefix('/auth')->name('auth/')->group(function(){

    Route::put("/profil/{id}", [AuthController::class, 'update'])->name('modifier');
    Route::get("/profil", [AuthController::class, 'edit'])->name('edit');

});
