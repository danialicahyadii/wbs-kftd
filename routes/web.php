<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\CaraMelaporController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FileBuktiController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\JenisPelanggaranController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PihakTerlibatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaksiSaksiController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TerlaporController;
use App\Http\Controllers\TutorialController;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);

Route::controller(FrontEndController::class)->group(function () {
    Route::get('', 'beranda');
    Route::get('kontak-kami', 'kontakKami');
    Route::get('faq', 'faq');
    Route::post('search-pengaduan', 'search')->name('search-pengaduan');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('download', [PengaduanController::class, 'download'])->name('file.download');
    Route::get('pengaduan/print/{id}', [PengaduanController::class, 'print'])->name('pengaduan.print');
    Route::get('/notifications/unseen', [KomentarController::class, 'loadUnseenNotifications'])->name('notifications.unseen');
    Route::post('/notifications/mark-as-seen', [KomentarController::class, 'markAsSeen'])->name('notifications.mark_as_seen');
    Route::resources([
        'pengaduan' => PengaduanController::class,
        'terlapor' => TerlaporController::class,
        'pihak-terlibat' => PihakTerlibatController::class,
        'saksi-saksi' => SaksiSaksiController::class,
        'file-bukti' => FileBuktiController::class,
        'status' => StatusController::class,
        'cara-melapor' => CaraMelaporController::class,
        'komentar' => KomentarController::class,
        'faq-admin' => FaqController::class,
        'jenis-pelanggaran' => JenisPelanggaranController::class,
    ]);
    Route::resource('laporan', LaporanController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
