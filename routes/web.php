<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index']);
// Rute untuk halaman utama (dashboard)
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', [DashboardController::class, 'index']);
});

// Rute login dan registrasi
Route::pattern('id', '[0-9]+');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('register', [AuthController::class,'register']);
Route::post('register', [AuthController::class,'postregister']);

// Rute yang dilindungi oleh autentikasi
Route::middleware('auth')->group(function () {

    Route::get('/welcome', [WelcomeController::class,'index']);

    Route::group(['prefix' => 'catalog'], function () {
        Route::get('/', [CatalogController::class, 'index']);
    });

    Route::group(['prefix' => 'assets'], function () {
        Route::get('/', [AssetsController::class, 'index']);
    });

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'index']);
        Route::post('upload_foto', [ProfileController::class, 'upload'])->name('upload.foto');
        Route::get('/photo', [ProfileController::class, 'showProfileImage'])->name('profile.photo');
        Route::put('/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
        Route::get('/{id}/edit_ajax', [ProfileController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [ProfileController::class, 'update_ajax']);

    });

    Route::group(['prefix' => 'account'], function () {
        Route::get('/', [AccountController::class, 'index']);
    });

    Route::group(['prefix' => 'client'], function () {
        Route::get('/', [ClientController::class, 'index']);
    });

    Route::middleware(['authorize:ADM'])->group(function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/list', [UserController::class, 'list']);
        Route::get('/create', [UserController::class, 'create']);
        Route::post('/', [UserController::class, 'store']);
        Route::get('/create_ajax', [UserController::class, 'create_ajax']);
        Route::post('/ajax', [UserController::class, 'store_ajax']);
        Route::get('/{id}', [UserController::class, 'show']);
        Route::get('/{id}/edit', [UserController::class, 'edit']);
        Route::put('/{id}', [UserController::class, 'update']);
        Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);
        Route::get('/{id}/show_ajax', [UserController::class, 'show_ajax']);
        Route::get('/import', [UserController::class, 'import']);
        Route::post('/import_ajax', [UserController::class, 'import_ajax']);
        Route::get('/export_excel', [UserController::class, 'export_excel']); // export excel
        Route::get('/export_pdf', [UserController::class, 'export_pdf']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
    });
});

    Route::middleware(['authorize:ADM,MNG'])->group(function () {
        Route::get('/level', [LevelController::class, 'index']);
        Route::post('/level/list', [LevelController::class, 'list']);
        Route::get('/level/create', [LevelController::class, 'create']);
        Route::get('/level/create_ajax', [LevelController::class, 'create_ajax']);
        Route::post('/level/ajax', [LevelController::class, 'store_ajax']);
        Route::post('/level', [LevelController::class, 'store']);
        Route::get('/level/import', [LevelController::class, 'import']);
        Route::post('/level/import_ajax', [LevelController::class, 'import_ajax']);
        Route::get('/level/export_excel', [LevelController::class, 'export_excel']); 
        Route::get('/level/export_pdf', [LevelController::class, 'export_pdf']); 
        Route::get('/level/{id}', [LevelController::class, 'show']);
        Route::get('/level/{id}/edit', [LevelController::class, 'edit']);
        Route::put('/level/{id}', [LevelController::class, 'update']);
        Route::get('/level/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);
        Route::put('/level/{id}/update_ajax', [LevelController::class, 'update_ajax']);
        Route::get('/level/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);
        Route::delete('/level/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);
        Route::get('/{id}/show_ajax', [LevelController::class, 'show_ajax']);
        Route::delete('/level/{id}', [LevelController::class, 'destroy']);
    });

    Route::middleware(['authorize:ADM'])->group(function () {
    Route::group(['prefix' => 'kategori'], function () {
        Route::get('/', [KategoriController::class, 'index']);
        Route::post('/list', [KategoriController::class, 'list']);
        Route::get('/create', [KategoriController::class, 'create']);
        Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);
        Route::post('/ajax', [KategoriController::class, 'store_ajax']);
        Route::post('/', [KategoriController::class, 'store']);
        Route::get('/{id}', [KategoriController::class, 'show']);
        Route::get('/{id}/edit', [KategoriController::class, 'edit']);
        Route::put('/{id}', [KategoriController::class, 'update']);
        Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
        Route::get('/{id}/show_ajax', [KategoriController::class, 'show_ajax']);
        Route::get('/import', [KategoriController::class, 'import']);
        Route::post('/import_ajax', [KategoriController::class, 'import_ajax']);
        Route::get('/export_excel', [KategoriController::class, 'export_excel']); 
        Route::get('/export_pdf', [KategoriController::class, 'export_pdf']); 
        Route::delete('/{id}', [KategoriController::class, 'destroy']);
    });
});

Route::middleware(['authorize:ADM'])->group(function () {
    Route::group(['prefix' => 'barang'], function () {
        Route::get('/', [BarangController::class, 'index']);
        Route::post('/list', [BarangController::class, 'list']);
        Route::get('/create', [BarangController::class, 'create']);
        Route::get('/create_ajax', [BarangController::class, 'create_ajax']);
        Route::post('/ajax', [BarangController::class, 'store_ajax']);
        Route::post('/', [BarangController::class, 'store']);
        Route::get('/{id}', [BarangController::class, 'show']);
        Route::get('/{id}/edit', [BarangController::class, 'edit']);
        Route::put('/{id}', [BarangController::class, 'update']);
        Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);
        Route::get('/{id}/show_ajax', [BarangController::class, 'show_ajax']);
        Route::get('/import', [BarangController::class, 'import']);
        Route::post('/import_ajax', [BarangController::class, 'import_ajax']);
        Route::get('/export_excel', [BarangController::class, 'export_excel']); 
        Route::get('/export_pdf', [BarangController::class, 'export_pdf']); 
        Route::delete('/{id}', [BarangController::class, 'destroy']);
    });
});

 
    Route::middleware(['authorize:ADM'])->group(function () {
    Route::group(['prefix' => 'supplier'], function () {
        Route::get('/', [SupplierController::class, 'index']);
        Route::post('/list', [SupplierController::class, 'list']);
        Route::get('/create', [SupplierController::class, 'create']);
        Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);
        Route::post('/ajax', [SupplierController::class, 'store_ajax']);
        Route::post('/', [SupplierController::class, 'store']);
        Route::get('/{id}', [SupplierController::class, 'show']);
        Route::get('/{id}/edit', [SupplierController::class, 'edit']);
        Route::put('/{id}', [SupplierController::class, 'update']);
        Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);
        Route::get('/import', [SupplierController::class, 'import']);
        Route::post('/import_ajax', [SupplierController::class, 'import_ajax']);
        Route::get('/export_excel', [SupplierController::class, 'export_excel']); 
        Route::get('/export_pdf', [SupplierController::class, 'export_pdf']); 
        Route::get('/{id}/show_ajax', [SupplierController::class, 'show_ajax']);
    });
});

    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
            Route::get('/stok', [StokController::class, 'index']);
            Route::post('/stok/list', [StokController::class, 'list']);
            Route::get('/stok/create', [StokController::class, 'create']);
            Route::post('/stok', [StokController::class, 'store']);
            Route::get('/stok/create_ajax', [StokController::class, 'create_ajax']);
            Route::post('/stok/ajax', [StokController::class, 'store_ajax']);
            Route::get('/stok/{id}', [StokController::class, 'show']);
            Route::get('/stok/{id}/edit', [StokController::class, 'edit']);
            Route::put('/stok/{id}', [StokController::class, 'update']);
            Route::get('/stok/{id}/show_ajax', [StokController::class, 'show_ajax']);
            Route::get('/stok/{id}/edit_ajax', [StokController::class, 'edit_ajax']);
            Route::put('/stok/{id}/update_ajax', [StokController::class, 'update_ajax']);
            Route::get('/stok/{id}/delete_ajax', [StokController::class, 'confirm_ajax']);
            Route::delete('/stok/{id}/delete_ajax', [StokController::class, 'delete_ajax']);
            Route::get('/stok/{id}/show_ajax', [StokController::class, 'show_ajax']);
            Route::get('/stok/import', [StokController::class, 'import']);
            Route::post('/stok/import_ajax', [StokController::class, 'import_ajax']);
            Route::get('/stok/export_excel', [StokController::class, 'export_excel']); 
            Route::get('/stok/export_pdf', [StokController::class, 'export_pdf']); 
            Route::delete('/stok/{id}', [StokController::class, 'destroy']);
    });

    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::get('/penjualan', [PenjualanController::class, 'index']);
        Route::post('/penjualan/list', [PenjualanController::class, 'list']);
        Route::get('/penjualan/create', [PenjualanController::class, 'create']);
        Route::post('/penjualan', [PenjualanController::class, 'store']);
        Route::get('/penjualan/create_ajax', [PenjualanController::class, 'create_ajax']);
        Route::post('/penjualan/ajax', [PenjualanController::class, 'store_ajax']);
        Route::get('/penjualan/{id}', [PenjualanController::class, 'show']);
        Route::get('/penjualan/{id}/edit', [PenjualanController::class, 'edit']);
        Route::put('/penjualan/{id}', [PenjualanController::class, 'update']);
        Route::get('/penjualan/{id}/show_ajax', [PenjualanController::class, 'show_ajax']);
        Route::get('/penjualan/{id}/edit_ajax', [PenjualanController::class, 'edit_ajax']);
        Route::put('/penjualan/{id}/update_ajax', [PenjualanController::class, 'update_ajax']);
        Route::get('/penjualan/{id}/delete_ajax', [PenjualanController::class, 'confirm_ajax']);
        Route::delete('/penjualan/{id}/delete_ajax', [PenjualanController::class, 'delete_ajax']);
        Route::get('/penjualan/{id}/show_ajax', [PenjualanController::class, 'show_ajax']);
        Route::get('/penjualan/import', [PenjualanController::class, 'import']);
        Route::post('/penjualan/import_ajax', [PenjualanController::class, 'import_ajax']);
        Route::get('/penjualan/export_excel', [PenjualanController::class, 'export_excel']); 
        Route::get('/penjualan/export_pdf', [PenjualanController::class, 'export_pdf']); 
        Route::delete('/penjualan/{id}', [PenjualanController::class, 'destroy']);
});

Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
    Route::get('/detail', [DetailController::class, 'index']);          // menampilkan halaman awal stok
    Route::post('/detail/list', [DetailController::class, 'list']);  // menampilkan halaman form tambah stok
    Route::get('/detail/create_ajax', [DetailController::class, 'create_ajax']);
    Route::post('/detail/ajax', [DetailController::class, 'store_ajax']);       // menyimpan data stok baru
    Route::get('/detail/import', [DetailController::class, 'import']);
    Route::post('/detail/import_ajax', [DetailController::class, 'import_ajax']);
    Route::get('/detail/export_excel', [DetailController::class, 'export_excel']); // export excel
    Route::get('/detail/export_pdf', [DetailController::class, 'export_pdf']); // export pdf
    Route::get('/detail/{id}', [DetailController::class, 'show']);    // menyimpan perubahan data stok
    Route::get('/detail/{id}/edit_ajax', [DetailController::class, 'edit_ajax']);
    Route::put('/detail/{id}/update_ajax', [DetailController::class, 'update_ajax']);
    Route::get('/detail/{id}/delete_ajax', [DetailController::class, 'confirm_ajax']);
    Route::delete('/detail/{id}/delete_ajax', [DetailController::class, 'delete_ajax']);
    Route::delete('/detail/{id}/delete_ajax', [DetailController::class, 'show_ajax']);
    Route::get('/detail/import', [DetailController::class, 'import']);
    Route::post('/detail/import_ajax', [DetailController::class, 'import_ajax']);
    Route::get('/detail/export_excel', [DetailController::class, 'export_excel']); 
    Route::get('/detail/export_pdf', [DetailController::class, 'export_pdf']); 
    Route::delete('/detail/{id}', [DetailController::class, 'destroy']); // menghapus data stok
});
});
