<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\DosensController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\LoginController;
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
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('users/login');
})->name('login');

Route::get('/login', function () {
    return view('users/login');
});

Route::POST('/postlogin', [LoginController::class, 'postlogin']);
Route::get('/register', [LoginController::class, 'register']);
Route::POST('/postregis', [LoginController::class, 'postregis']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth'],'ceklevel:admin')->group(function () {
    Route::resource('students', StudentsController::class);
    Route::resource('dosens', DosensController::class);
});


Route::middleware(['auth'],'ceklevel:admin,user')->group(function () {
    Route::get('/dashboard', [PagesController::class, 'home']);
    Route::get('/mahasiswa', [PagesController::class, 'mahasiswa']);
    Route::get('/dosen', [PagesController::class, 'dosen']);

});



// Route::get('/about', function () {
//     $var='This is Adinda';
//     return view('about', ['var'=>$var]);
// });

// Students
// cara manual
// Route::get('/students', [StudentsController::class, 'index']);
// Route::get('/students/create', [StudentsController::class, 'create']);
// Route::get('/students/{student}', [StudentsController::class, 'show']);
// Route::post('/students', [StudentsController::class, 'store']);
// Route::get('/students/{student}/edit', [StudentsController::class, 'edit']);
// Route::put('/students/{student}', [StudentsController::class, 'update']);
// Route::get('/students/{student}/delete', [StudentsController::class, 'destroy']);

// cara cepet kalau membuat CRUD dengan artisan resource

