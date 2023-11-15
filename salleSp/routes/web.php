<?php
use App\Http\Controllers\CompteController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\TypeAbonnementController;
use App\Http\Controllers\AbonnerController;
use App\Http\Controllers\SeanceController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SportController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/testcon', function () {
    return view('test');
});
Route::get('/', function () {
    return view('Home');
})->name('home');
Route::get('/login', function () {
    return view('Login');
});
Route::get('/classes', function () {
    return view('classes');
})->name('classes');
// Route::get('/registration', function () {
//     return view('Registration');
// });
Route::get('/trainer', function () {
    return view('trainer');
})->name('trainer');
Route::get('/contactUs', function () {
    return view('contactUs');
});
Route::get('/login', function () {
    return view('Login');
});
// Route::get('/admin/addUser', function () {
//     return view('/admin/addUser');
// });
Route::get('/logout', [CompteController::class,'logoutUser'])->name('logout');
 Route::post('/registerUser',[CompteController::class,'registerUser'])->name('registerUser');
  Route::get('/login',[CompteController::class,'login'])->name('login');
  Route::post('loginUser',[CompteController::class,'loginUser'])->name('loginUser');
  Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/user/dashboard', [ClientController::class, 'dashboard'])->name('user.dashboard');
Route::get('/coach/dashboard', [CoachController::class, 'dashboard'])->name('coach.dashboard');
Route::get('/user/chooseAbo', [ClientController::class, 'chooseAbo'])->name('user.chooseAbo');

Route::get('/admin/addUser', [AdminController::class, 'addUser'])->name('admin.addUser');
  Route::get('/admin/addCoach', [AdminController::class, 'addCoach'])->name('admin.addCoach');
  Route::get('/admin/addSport', [AdminController::class, 'addSport'])->name('admin.addSport');
  Route::get('/admin/abonnements', [AdminController::class, 'abonnements'])->name('admin.abonnements');
  Route::get('/registration', [SportController::class, 'renderForm'])->name('regitration');

///////////////////////////////////////////////////////
//  Route::match(['post', 'put', 'delete'], '/admin/save', [ClientController::class, 'save'])->name('admin.save');
Route::post('admin/save',[ClientController::class, 'save'])->name('admin.save');
 Route::match(['post', 'delete'], '/admin/save', [ClientController::class, 'save'])->name('admin.save');
Route::put('/admin/clients/{id}', [ClientController::class, 'update'])->name('updateClient');
Route::delete('/admin/clients/{id}', [ClientController::class, 'destroy'])->name('deleteClient');
Route::post('admin/saveSport',[SportController::class, 'saveSport'])->name('admin.saveSport');
// Route::put('/admin/sport/{CodeS}', [SportController::class, 'updateSport'])->name('updateSport');
Route::put('/admin/sports/{id}', [SportController::class, 'updateSport'])->name('updateSport');
Route::delete('/admin/sports/{id}', [SportController::class, 'destroySport'])->name('deleteSport');
Route::post('admin/saveCoach',[CoachController::class, 'saveCoach'])->name('admin.saveCoach');
Route::put('/admin/coaches/{id}', [CoachController::class, 'updateCoach'])->name('updateCoach');
Route::delete('/admin/coaches/{id}', [CoachController::class, 'destroyCoach'])->name('deleteCoach');
///////////////////////// salle
Route::get('/admin/addSalle', [AdminController::class, 'addSalle'])->name('admin.addSalle');
Route::post('admin/saveSalle',[SalleController::class, 'saveSalle'])->name('admin.saveSalle');
Route::put('/admin/salles/{id}', [SalleController::class, 'updateSalle'])->name('updateSalle');
Route::delete('/admin/salles/{id}', [SalleController::class, 'destroySalle'])->name('deleteSalle');
//////////profile
Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
Route::post('/admin/updateProfile', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');
////////////////////abonnements
Route::post('admin/saveAbonnement',[TypeAbonnementController::class, 'saveAbonnement'])->name('admin.saveAbonnement');
Route::put('/admin/abonnements/{id}', [TypeAbonnementController::class, 'updateAbonnement'])->name('updateAbonnement');
Route::delete('/admin/abonnements/{id}', [TypeAbonnementController::class, 'destroyAbonnement'])->name('deleteAbonnement');
///////////////notifications
Route::get('/admin/notifications', [AdminController::class, 'notifications'])->name('admin.notifications');
////////////////////////abonner
Route::post('/user/abonner', [AbonnerController::class,'store'])->name('user.abonner.store');
/////////////////////seance
Route::get('admin/seance', [AdminController::class, 'seance'])->name('admin.seance');
Route::post('admin/saveSeance', [SeanceController::class, 'saveSeance'])->name('admin.saveSeance');
Route::put('/admin/seances/{id}', [SeanceController::class, 'updateSeance'])->name('updateSeance');
Route::delete('/admin/seances/{id}', [SeanceController::class, 'destroySeance'])->name('deleteSeance');
////////////client profile
Route::get('/user/profile', [ClientController::class, 'profile'])->name('user.profile');
Route::post('/user/updateProfile', [ClientController::class, 'updateProfile'])->name('user.updateProfile');
/////////////////////coach profile
Route::get('/coach/profile', [CoachController::class, 'profile'])->name('coach.profile');
Route::post('/coach/updateProfile', [CoachController::class, 'updateProfile'])->name('coach.updateProfile');
