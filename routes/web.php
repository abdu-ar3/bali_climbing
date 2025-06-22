<?php

use App\Http\Controllers\Admin\ClassPackageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\ParticipantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController as ControllersBookingController;
use App\Http\Controllers\Customer\BookingController;
use App\Http\Controllers\Customer\FeedbackController;
use App\Http\Controllers\FrontendController;
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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginShow');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerStore'])->name('registerStore');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/', [AuthController::class, 'home'])->name('home');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::put('/booking/{id}/upload-bukti', [\App\Http\Controllers\Customer\BookingController::class, 'uploadBukti'])->name('customer.bukti.upload');


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('class-packages', ClassPackageController::class);
    Route::resource('participants', ParticipantController::class);
    Route::resource('instructors', InstructorController::class);
    Route::resource('bookings', ControllersBookingController::class);
});

Route::middleware(['auth', 'role:instruktur'])->prefix('instruktur')->name('instruktur.')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/jadwal', [ClassScheduleController::class, 'index'])->name('jadwal');
    Route::get('/jadwal-saya', [ClassScheduleController::class, 'myClasses'])->name('jadwal.saya'); // Rute baru
    Route::get('/feedback', [ParticipantFeedbackController::class, 'index'])->name('feedback');
  // Rute untuk feedback peserta
    Route::post('/feedback/{userId}/{classPackageId}', [ParticipantFeedbackController::class, 'store'])->name('feedback.store');
    Route::get('/feedback', [ParticipantFeedbackController::class, 'index'])->name('feedback');
    Route::get('/profil', [ProfileController::class, 'index'])->name('profil');
    Route::get('/peserta/{classId}', [ClassScheduleController::class, 'classParticipants'])->name('peserta');
});

Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function() {
    Route::get('/class-packages', [BookingController::class, 'index'])->name('class-packages.index');
    Route::get('/class-packages/{id}', [ClassPackageController::class, 'show'])->name('class-packages.show');
    Route::post('/book', [BookingController::class, 'store'])->name('book');
    Route::get('/bookings', [BookingController::class, 'showBookings'])->name('bookings.index');

    Route::get('/feedback/create/{classPackageId}', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedbackcust', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
    Route::get('/feedback/show/{classPackageId}', [FeedbackController::class, 'show'])->name('feedback.show');
});
