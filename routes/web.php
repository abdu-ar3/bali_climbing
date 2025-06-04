<?php

use App\Http\Controllers\Admin\ClassPackageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\ParticipantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Customer\BookingController;
use App\Http\Controllers\Customer\FeedbackController;
use App\Http\Controllers\Instructor\ClassScheduleController;
use App\Http\Controllers\Instructor\ParticipantFeedbackController;
use App\Http\Controllers\Instructor\ProfileController;
use App\Http\Controllers\ParticipantFeedbackController as ControllersParticipantFeedbackController;
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

Route::get('/', function () {
    return view('admin.layout');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginShow');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/home', [AuthController::class, 'home'])->name('home');
Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('class-packages', ClassPackageController::class);
    Route::resource('participants', ParticipantController::class);
    Route::resource('instructors', InstructorController::class);
});

Route::middleware(['auth', 'role:instruktur'])->prefix('instruktur')->name('instruktur.')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/jadwal', [ClassScheduleController::class, 'index'])->name('jadwal');
    Route::get('/feedback', [ParticipantFeedbackController::class, 'index'])->name('feedback');
    Route::post('/feedback/{bookingId}', [ParticipantFeedbackController::class, 'store'])->name('feedback.store');
    Route::post('/feedback/store/{bookingId}', [ParticipantFeedbackController::class, 'store'])->name('feedback.store');
    Route::get('/profil', [ProfileController::class, 'index'])->name('profil');
});

Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function() {
    Route::get('/class-packages', [BookingController::class, 'index'])->name('class-packages.index');
    Route::get('/class-packages/{id}', [ClassPackageController::class, 'show'])->name('class-packages.show');
    Route::post('/book', [BookingController::class, 'store'])->name('book');
    Route::get('/bookings', [BookingController::class, 'showBookings'])->name('bookings.index');
    Route::get('/feedback/create/{classPackageId}', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
});