<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\AdminInstructorController;
use App\Http\Controllers\backend\CartController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\CourseController;
use App\Http\Controllers\backend\CourseSectionController;
use App\Http\Controllers\backend\InfoController;
use App\Http\Controllers\backend\InstructorController;
use App\Http\Controllers\backend\InstructorProfileController;
use App\Http\Controllers\backend\LectureController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\StudentController;
use App\Http\Controllers\backend\StudentProfileController;
use App\Http\Controllers\backend\SubcategoryController;
use App\Http\Controllers\frontend\FrontendDashboardController;
use App\Http\Controllers\frontend\WishlistController;
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
    Route::post('/update-status', [AdminInstructorController::class, 'updateStatus'])->name('instructor.status');
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


    //Manage Courses
    Route::resource('/course', CourseController::class);
    Route::get('/get-subcategories/{categoryId}', [CategoryController::class, 'getSubjectCategories']); //To fetch subcategires based on the category selected

    //Manage Course Section
    Route::resource('/course-section', CourseSectionController::class);

    //Manage Lectures
    Route::resource('/lecture', LectureController::class);

    
});





/////STUDENT ROUTES
Route::middleware(['auth', 'verified', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [StudentController::class, 'destroy'])->name('logout');


    //Student Profile Route
    Route::get('/profile', [StudentProfileController::class, 'index'])->name('profile');
    Route::post('/profile/store', [StudentProfileController::class, 'store'])->name('profile.store');
    Route::post('/password/setting', [StudentProfileController::class, 'passwordSetting'])->name('passwordSetting');


    // Wishlist Routes
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::get('/wishlist-data', [WishlistController::class, 'getWishlist']);
    Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');


    
    
});




// Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });




// FRONTEND ROUTES
Route::get('/', [FrontendDashboardController::class, 'home'])->name('frontend.home');

Route::get('/course-details/{slug}', [FrontendDashboardController::class, 'viewCourse'])->name('course-details');


//Wishlist Routes
Route::get('/wishlist/all', [WishlistController::class, 'allWishlist']);
Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist']);



// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/all', [CartController::class, 'allCart'])->name('cart.all');









require __DIR__.'/auth.php';
