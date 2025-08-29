<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\AdminInstructorController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\InfoController;
use App\Http\Controllers\backend\InstructorController;
use App\Http\Controllers\backend\InstructorProfileController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\SubcategoryController;
use App\Http\Controllers\frontend\FrontendDashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



// ADMIN ROUTES
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AdminController::class, 'destroy'])->name('logout');

    //Admin Profile Routes
    Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile');
    Route::post('/profile/store', [AdminProfileController::class, 'storeProfile'])->name('profile.store');
    Route::get('/setting', [AdminProfileController::class, 'setting'])->name('setting');
    Route::post('/password/setting', [AdminProfileController::class, 'passwordSetting'])->name('passwordSetting');

    // Category Routes
    Route::resource('/category', CategoryController::class);
    Route::resource('/subcategory', SubcategoryController::class);


    //Manage Slider Routes
    Route::resource('/slider', SliderController::class);


    //Manage Info Routes
    Route::resource('/info', InfoController::class);


    //Control Instructor Routes
    Route::resource('/instructor', AdminInstructorController::class);
    Route::post('/update-status', [AdminInstructorController::class, 'updateStatus'])->name('update.status');
    Route::get('/instructor-active-list', [AdminInstructorController::class, 'instructorActiveList'])->name('instructor.active');

    
});




// INSTRUCTOR ROUTES
Route::get('/instructor/login', [InstructorController::class, 'login'])->name('instructor.login');

Route::middleware(['auth', 'verified', 'role:instructor'])->prefix('instructor')->name('instructor.')->group(function () {
    Route::get('/dashboard', [InstructorController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [InstructorController::class, 'destroy'])->name('logout');

    //Instructor Profile Routes
    Route::get('/profile', [InstructorProfileController::class, 'index'])->name('profile');
    Route::post('/profile/store', [InstructorProfileController::class, 'storeProfile'])->name('profile.store');
    Route::get('/setting', [InstructorProfileController::class, 'setting'])->name('setting');
    Route::post('/password/setting', [InstructorProfileController::class, 'passwordSetting'])->name('passwordSetting');

    
});




// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });




// FRONTEND ROUTES
Route::get('/', [FrontendDashboardController::class, 'home'])->name('frontend.home');





require __DIR__.'/auth.php';
