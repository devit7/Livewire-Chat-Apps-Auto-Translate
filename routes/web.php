<?php

use App\Http\Controllers\AuthController;
use App\Livewire\AddContact;
use App\Livewire\ChatBox;
use App\Livewire\ContactList;
use Illuminate\Support\Facades\Auth;
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

/* Route::get('/', function () {
    return view('welcome');
});
 */

Route::get('/', function () {
    if (!Auth::check()) {//jika belum login
        return redirect('/login');
    }
    return view('home');
});


Route::get('/login', [AuthController::class, 'viewlogin'])->name('login');
Route::get('/register', [AuthController::class, 'viewregister'])->name('register');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/contacts', ContactList::class)->name('contacts');
    Route::get('/chat/{id}', ChatBox::class)->name('chat');
    Route::get('/add-contact', AddContact::class)->name('add-contact');
});