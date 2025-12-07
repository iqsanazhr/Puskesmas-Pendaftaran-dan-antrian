<?php

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

Route::get('/register', \App\Http\Livewire\PatientRegistration::class)->name('patient.register')->middleware('auth');
Route::get('/queue/ticket/{id}/pdf', [\App\Http\Controllers\QueueTicketController::class, 'downloadPdf'])->name('queue.ticket.pdf')->middleware('auth');
Route::get('/queue', \App\Http\Livewire\QueueMonitor::class)->name('queue.monitor');

Route::get('/signup', \App\Http\Livewire\AuthPage::class)->name('register');
Route::get('/login', \App\Http\Livewire\AuthPage::class)->name('login');
Route::get('/admin', \App\Http\Livewire\AdminDashboard::class)->name('admin.dashboard')->middleware('auth');
Route::get('/admin/messages', \App\Http\Livewire\AdminMessages::class)->name('admin.messages')->middleware('auth');
Route::get('/dashboard', \App\Http\Livewire\PatientDashboard::class)->name('patient.dashboard')->middleware('auth');
Route::get('/leader-dashboard', \App\Http\Livewire\LeaderDashboard::class)->name('leader.dashboard')->middleware('auth');

Route::view('/profil', 'profil')->name('profil');
Route::view('/layanan', 'layanan')->name('layanan');
Route::view('/fasilitas', 'fasilitas')->name('fasilitas');
Route::view('/kontak', 'kontak')->name('kontak');
Route::post('/kontak', function () {
    \App\Models\ContactMessage::create([
        'name' => request('full-name'),
        'email' => request('email'),
        'phone' => request('phone'),
        'message' => request('message')
    ]);
    return redirect()->back()->with('success', 'Pesan Anda telah terkirim! Kami akan segera menghubungi Anda.');
});

Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');
