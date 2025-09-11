<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\AdminCourseController;
use App\Http\Controllers\backend\AdminInstructorController;
use App\Http\Controllers\backend\BackendOrderController;
use App\Http\Controllers\backend\CartController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\CouponController;
use App\Http\Controllers\backend\CourseController;
use App\Http\Controllers\backend\CourseSectionController;
use App\Http\Controllers\backend\InfoController;
use App\Http\Controllers\backend\InstructorController;
use App\Http\Controllers\backend\InstructorProfileController;
use App\Http\Controllers\backend\LectureController;
use App\Http\Controllers\backend\PartnerController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\backend\StudentController;
use App\Http\Controllers\backend\StudentProfileController;
use App\Http\Controllers\backend\SubcategoryController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\FrontendDashboardController;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\frontend\WishlistController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('auth/google', [SocialController::class, 'googleLogin'])->name('auth.google');
Route::get('auth/google-callback', [SocialController::class, 'googleAuthentication'])->name('auth.google-callback');



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


    //Setting Routes
    Route::get('/mail-setting', [SettingController::class, 'mailSetting'])->name('mail.setting');
    Route::post('/mail-setting/update', [SettingController::class, 'updateMailSettings'])->name('mail.settings.update');


    Route::get('/stripe-setting', [SettingController::class, 'stripeSetting'])->name('stripe.setting');
    Route::post('/stripe-setting/update', [SettingController::class, 'updateStripeSettings'])->name('stripe.settings.update');


    Route::get('/google-setting', [SettingController::class, 'googleSetting'])->name('google.setting');
    Route::post('/google-setting/update', [SettingController::class, 'updateGoogleSettings'])->name('google.settings.update');


    //Control Course
    Route::resource('course', AdminCourseController::class);
    Route::post('course-status', [AdminCourseController::class, 'courseStatus'])->name('course.status');
    

    //Order Routes
    Route::resource('order', BackendOrderController::class);


    //Partner Routes
    Route::resource('partner', PartnerController::class);


    
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

    //Coupon Route
    Route::resource('/coupon', CouponController::class);


    
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
Route::get('/cart/all', [CartController::class, 'allCart'])->name('cart.all');

Route::get('/fetch/cart', [CartController::class, 'fetchCart']);
Route::post('/remove/cart', [CartController::class, 'removeCart']);


//Checkout Routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

/* Coupon Apply    */
Route::post('/apply-coupon', [CouponController::class, 'applyCoupon']);

//Checkout Coupon
Route::post('/apply-checkout-coupon', [CouponController::class, 'applyCheckoutCoupon'])->name('checkout.coupon');



//Protected Auth Route
Route::middleware('auth')->group(function (){
    
    //Order Routes
    Route::post('order', [OrderController::class, 'order'])->name('order');
    Route::get('payment-success', [OrderController::class, 'success'])->name('success');
    Route::get('payment-cancel', [OrderController::class, 'cancel'])->name('cancel');
});








require __DIR__.'/auth.php';
