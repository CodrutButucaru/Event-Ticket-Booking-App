<?php

namespace App\Http\Controllers;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use Illuminate\Http\Request;

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

Route::get('/', [EventController::class, 'index'])->name('index');

// Utilizatorii accesează pagina de înregistrare
Route::get('/user/register', [UserController::class, 'showRegistrationForm'])->name('user.registerForm');

// Procesarea formularului de înregistrare prin POST
Route::post('/user/register', [UserController::class, 'register'])->name('user.register');

// Utilizatorii accesează pagina de logare
Route::get('/user/login', [UserController::class, 'showLoginForm'])->name('user.loginForm');

// Procesarea formularului de logare prin POST
Route::post('/user/login', [UserController::class, 'login'])->name('user.login');

// Utilizatorii accesează pagina de deconectare
Route::get('/user/logout', [UserController::class, 'showLogoutForm'])->name('user.logoutForm');

// Procesarea formularului de deconectare prin POST
Route::post('/user/logout', [UserController::class, 'logout'])->name('user.logout');

// Utilizatorii accesează pagina de informatii
Route::get('/user/info', [UserController::class, 'userInfo'])->name('user.info');

Route::get('/user', [UserController::class, 'show'])->name('user.show');

// Utilizatorii accesează pagina de stergere a contului
Route::get('/user/delete', [UserController::class, 'deleteForm'])->name('user.deleteForm');

// Procesarea formularului de stergere prin POST
Route::post('/user/delete', [UserController::class, 'delete'])->name('user.delete');

//form pentru schimbarea parolei
Route::get('/user/edit',[UserController::class, 'showEditPasswordForm'])->name('user.editPasswordForm');

//procesarea formularului de schimbare a parolei
Route::post('/user/edit',[UserController::class, 'editPassword'])->name('user.edit');

Route::get('/admin/panel', [AdminController::class, 'index']);//->middleware('auth:admin');

Route::get('/admin/logout', [AdminController::class, 'showLogoutForm'])->name('admin.logoutForm');

Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.loginForm');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');

// Utilizatorii accesează pagina de înregistrare
//Route::get('/admin/register', [AdminController::class, 'showRegistrationForm'])->name('admin.registerForm');

// Procesarea formularului de înregistrare prin POST
//Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register');

Route::get('/showEvents', [EventController::class, 'showEvents'])->name('event.showEvents');

Route::get('/event/{id}', [EventController::class, 'showEvent'])->name('event.showEvent');

Route::get('/event/pag2/{id}', [EventController::class, 'pag2'])->name('event.pag2');

Route::get('/event/pag3/{id}', [EventController::class, 'pag3'])->name('event.pag3');

Route::get('/event/pag4/{id}', [EventController::class, 'pag4'])->name('event.pag4');

Route::get('/event/pag5/{id}', [EventController::class, 'pag5'])->name('event.pag5');

//Route::get('/session', [StripeController::class, 'session'])->name('session');
Route::post('/checkout', [StripeController::class, 'checkout'])->name('checkout');
Route::get('/success', [StripeController::class, 'success'])->name('success');
Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');

//Route::post('/session', [EventsController::class, 'session'])->name('session');
//Route::get('/', [EventsController::class, 'index']);
Route::get('/cos', [EventsController::class, 'cos'])->name('cos');
Route::get('/add-to-cos/{id}', [EventsController::class, 'addToCos'])->name('add_to_cos');
Route::patch('update-cos', [EventsController::class, 'update'])->name('update_cos');
Route::delete('remove-from-cos', [EventsController::class, 'remove'])->name('remove_from_cos');


// Ruta pentru afișarea listei de evenimente
Route::get('/events', [EventController::class, 'index2'])->name('events.index2');

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

// Dashboard
Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Evenimente
Route::prefix('events')->group(function () {
    Route::get('', [EventController::class, 'index2'])->name('events');
    Route::get('create', [EventController::class, 'create'])->name('events.create');
    Route::post('store', [EventController::class, 'store'])->name('events.store');
    Route::get('show/{id}', [EventController::class, 'show'])->name('events.show');
    Route::get('edit/{id}', [EventController::class, 'edit'])->name('events.edit');
    Route::put('edit/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('destroy/{id}', [EventController::class, 'destroy'])->name('events.destroy');
});

// Profil
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
Route::post('/profile', [AuthController::class, 'profile']);




