<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [DataController::class,'index']);

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/dashboard/tambah-user', [ProfileController::class, 'tambahuser'])->name('tambah.user');
    Route::patch('/dashboard/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/dashboard/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/dashboard/data', [DataController::class, 'show'])->name('data.show');
    Route::post('/dashboard/data\{data_uji:nama_kecamatan}', [DataController::class, 'update'])->name('data.update');
    Route::get('/dashboard/hasil-cluster', [DataController::class, 'hasilCluster'])->name('hasilCluster');
});

require __DIR__.'/auth.php';
