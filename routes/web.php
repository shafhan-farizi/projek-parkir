<?php

use App\Http\Controllers\AreaParkirController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KampusController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\AreaParkir;
use App\Models\Kendaraan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/contact', function() {
    return view('contact');
})->name('contact');


Route::controller(AuthController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerLogic')->name('register');
    
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginLogic')->name('login');
    
    Route::get('logout', 'logout')->name('logout');
});


Route::middleware(['auth-check', 'is-admin'])->group(function() {
    Route::get('/registrasi-kendaraan', [KendaraanController::class, 'registrasiKendaraan'])->name('registrasi-kendaraan')->withoutMiddleware('is-admin');

    Route::prefix('admin')->group(function() {
        Route::get('/', function() {
            $user = User::all()->count();
            $kendaraan = Kendaraan::all()->count();
            $area_parkir = AreaParkir::all()->count();
            $transaksi = Transaksi::all()->count();

            return view('admin.index', [
                'user' => $user,
                'kendaraan' => $kendaraan,
                'area_parkir' => $area_parkir,
                'transaksi' => $transaksi,
            ]);
        })->name('admin.dashboard');

        Route::prefix('user')->controller(UserController::class)->group(function() {
            Route::get('/', 'index')->name('admin.user');
    
            Route::get('/profile/{id}', 'show')->name('profile')->withoutMiddleware('is-admin');
    
            Route::get('/add', 'create')->name('admin.user.add');
            Route::post('/add', 'store')->name('admin.user.add');
    
            Route::get('/edit/{id}', 'edit')->name('admin.user.edit');
            Route::put('/edit/{id}', 'update')->name('admin.user.edit'); 
    
            Route::put('/change-password/{id}', 'changePassword')->name('profile.change-password')->withoutMiddleware('is-admin');
    
            Route::put('/profile/edit/{id}', 'updateUser')->name('profile.edit')->withoutMiddleware('is-admin');
    
            Route::delete('/delete/{id}', 'destroy')->name('admin.user.delete');
        });
    
        Route::prefix('kendaraan')->controller(KendaraanController::class)->group(function() {
            Route::get('/', 'index')->name('admin.kendaraan');
            
            Route::get('/add', 'create')->name('admin.kendaraan.add');
            Route::post('/add', 'store')->name('admin.kendaraan.add')->withoutMiddleware('is-admin');
            
            Route::get('/edit/{id}', 'edit')->name('admin.kendaraan.edit');
            Route::put('/edit/{id}', 'update')->name('admin.kendaraan.edit');
            
            Route::delete('/delete/{id}', 'destroy')->name('admin.kendaraan.delete');
        });
    
        Route::prefix('area-parkir')->controller(AreaParkirController::class)->group(function() {
            Route::get('/', 'index')->name('admin.area-parkir');
            
            Route::get('/add', 'create')->name('admin.area-parkir.add');
            Route::post('/add', 'store')->name('admin.area-parkir.add');
            
            Route::get('/edit/{id}', 'edit')->name('admin.area-parkir.edit');
            Route::put('/edit/{id}', 'update')->name('admin.area-parkir.edit');
            
            Route::delete('/delete/{id}', 'destroy')->name('admin.area-parkir.delete');
        });
    
        Route::prefix('kampus')->controller(KampusController::class)->group(function() {
            Route::get('/', 'index')->name('admin.kampus');
            
            Route::get('/add', 'create')->name('admin.kampus.add');
            Route::post('/add', 'store')->name('admin.kampus.add');
            
            Route::get('/edit/{id}', 'edit')->name('admin.kampus.edit');
            Route::put('/edit/{id}', 'update')->name('admin.kampus.edit');
            
            Route::delete('/delete/{id}', 'destroy')->name('admin.kampus.delete');        
        });
    
        Route::prefix('transaksi')->controller(TransaksiController::class)->group(function() {
            Route::get('/', 'index')->name('admin.transaksi');
    
            Route::get('/check-in', 'checkIn')->name('admin.check-in');
            Route::post('/check-in/{kendaraan_id}/{area_parkir_id}', 'checkInLogic')->name('admin.check-in.add');
    
            Route::get('/check-out', 'checkOut')->name('admin.check-out');
            Route::post('/check-out/{kendaraan_id}', 'checkOutLogic')->name('admin.check-out.add');
            
            Route::delete('/delete/{id}', 'destroy')->name('admin.transaksi.delete');
    
            Route::get('/nopol', 'getNoPol');
            Route::get('/nopol/checked', 'getChecked');
    
            Route::get('/kendaraan/{nopol}', 'kendaraanDetail');
            Route::get('/{id}', 'transaksiDetail');
        });
    });

    

});