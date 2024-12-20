<?php

    use App\Http\Controllers\AdminLoginController;
    use App\Http\Controllers\AdminLogoutController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\EmailController;
    use App\Http\Controllers\EventController;
    use App\Http\Controllers\ParticipantController;
    use App\Http\Controllers\PaymentConfirmationController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\ShowSuccessController;
use App\Http\Middleware\UserCanViewEvents;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('admin-login', [AdminLoginController::class, 'index'])->name('admin-login.index');
Route::post('admin-login', [AdminLoginController::class, 'handle'])->name('admin-login.handle');
Route::get('admin-register', [AdminRegisterController::class, 'index'])->name('admin-register.index');
Route::post('admin-register', [AdminRegisterController::class, 'create'])->name('admin-register.create');

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::post('/admin/logout', AdminLogoutController::class)->name('admin.logout');

    Route::get('/admin/events', [EventController::class, 'index'])->name('admin.events.index');
    Route::get('/admin/events/create', [EventController::class, 'create'])->name('admin.events.create');
    Route::post('/admin/events', [EventController::class, 'store'])->name('admin.events.store');
    Route::get('/admin/events/{event}', [EventController::class, 'show'])->name('admin.events.show')->middleware(UserCanViewEvents::class);
    Route::get('/admin/events/{event}/edit', [EventController::class, 'edit'])->name('admin.events.edit')->middleware(UserCanViewEvents::class);
    Route::patch('/admin/events/{event}', [EventController::class, 'update'])->name('admin.events.update')->middleware(UserCanViewEvents::class);
    Route::delete('/admin/events/{event}', [EventController::class, 'destroy'])->name('admin.events.destroy')->middleware(UserCanViewEvents::class);


    Route::get('/admin/{event}/participants/create', [ParticipantController::class, 'create'])->name('admin.participants.create');
    Route::post('/admin/{event}/participants', [ParticipantController::class, 'store'])->name('admin.participants.store');
    Route::get('/admin/{event}/participants/{participant}/edit', [ParticipantController::class, 'edit'])->name('admin.participants.edit');
    Route::patch('/admin/{event}/participants/{participant}', [ParticipantController::class, 'update'])->name('admin.participants.update');
    Route::delete('/admin/{event}/participants/{participant}', [ParticipantController::class, 'destroy'])->name('admin.participants.destroy');

    Route::post('/admin/{event}/participants/{participant}/sendemail', [EmailController::class, 'single'])->name('admin.participants.sendemail');
    Route::post('/admin/{event}/participants/sendemail-all', [EmailController::class, 'all'] )->name('admin.participants.sendemail.all');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/show-success-paid', ShowSuccessController::class )->name('guest.paid.success');
Route::get('/{event}/{participant}/confirm-paid', PaymentConfirmationController::class )->name('events.paid.info');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
