<?php

use App\Http\Controllers\FormulirController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Pages\Admin\ChangePassword;
use App\Http\Livewire\Pages\Admin\DashboardAdmin;
use App\Http\Livewire\Pages\Admin\Maba;
use App\Http\Livewire\Pages\Admin\MabaArchive;
use App\Http\Livewire\Pages\Admin\Setting;
use App\Http\Livewire\Pages\Dashboard;
use App\Http\Livewire\Pages\Pembayaran;

use App\Http\Livewire\Pages\Landing;
use App\Http\Livewire\Pages\Registrasi;

use App\Http\Livewire\Pages\User;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function () {
    Route::get('/registrasi', Registrasi::class)->name('reg');
    Route::get('/', Landing::class);
});

Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard-admin', DashboardAdmin::class)->name('admin.dashboard');
        Route::get('/maba-arsip-admin', MabaArchive::class)->name('admin.maba.arsip');
        Route::get('/maba-admin', Maba::class)->name('admin.maba');
        Route::get('/setting-admin', Setting::class)->name('admin.setting');
        Route::get('/change-password', ChangePassword::class)->name('admin.change.password');
    });
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::middleware('maba.terbayar')->get('/pembayaran', Pembayaran::class)->name('pembayaran');
    Route::get('/user', User::class)->name('user');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //PDF 
    Route::get('/formulir/download/{id?}', [FormulirController::class, 'download'])->name('formulir.download');
    Route::get('/formulir/view/{id?}', [FormulirController::class, 'view'])->name('formulir.view');
});

require __DIR__ . '/auth.php';
