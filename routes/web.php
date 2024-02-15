<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\InquireController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\testController;
use App\Http\Controllers\BenefitsController;
use App\Http\Controllers\QFAController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\GoalsController;
use App\Http\Controllers\AchievementsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UrlGeneratorController;



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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('forget-session', [WebController::class, 'forgetSession'])->name('forget-session');
Route::post('create-session', [WebController::class, 'createsession'])->name('create-session');

Auth::routes([
    'verify'=> true
]);

/**admin */
Route::group(['prefix' => 'dashboard', 'middleware' => [ 'AdminMiddleware']], function ()
{
    /**DASHBOARD */
    Route::get('/', [AdminController::class,'index'])->name('index.Admin');
    Route::get('edit_web/{id}', [AdminController::class,'edit'])->name('edit.Admin');
    Route::get('search_web/', [AdminController::class,'search'])->name('search.Admin');
    Route::PUT('edit_update/{id}', [AdminController::class,'update'])->name('update.Admin');

    /**DOCTOR _ CONTROLLER */
    Route::get('doctors', [DoctorController::class,'index'])->name('index.doctor');
    Route::get('quiry_doctor', [DoctorController::class,'search'])->name('search.doctor');
    Route::get('doctors/{id}', [DoctorController::class,'edit'])->name('doctor.edit');
    Route::post('store_doctor', [DoctorController::class,'store'])->name('doctor.store');
    Route::put('update_doctor/{id}', [DoctorController::class,'update'])->name('doctor.update');
    Route::delete('delete_doctor/{id}', [DoctorController::class,'delete'])->name('doctor.delete');
    Route::post('/email/send', [EmailController::class, 'send'])->name('email.send');
    /**    OFFER */
    Route::get('Discount', [DiscountController::class,'index'])->name('index.Discount');
    Route::get('quiry_discount', [DiscountController::class,'search'])->name('search.Discount');
    Route::get('Discount/{id}', [DiscountController::class,'edit'])->name('edit.Discount');
    Route::post('store/Discount', [DiscountController::class,'store'])->name('Discount.store');
    Route::put('update/Discount/{id}', [DiscountController::class,'update'])->name('Discount.update');
    Route::delete('delete/Discount/{id}', [DiscountController::class,'delete'])->name('Discount.delete');


    /**COURSES ROUTE */
    Route::get('courses', [CoursesController::class,'index'])->name('index.courses');
    Route::get('courses/{id}', [CoursesController::class,'edit'])->name('courses.edit');
    Route::get('quiry_courses', [CoursesController::class,'search'])->name('search.courses');
    Route::post('store_courses', [CoursesController::class,'store'])->name('courses.store');
    Route::put('update_coursesr/{id}', [CoursesController::class,'update'])->name('courses.update');
    Route::delete('delete_coursesr/{id}', [CoursesController::class,'delete'])->name('coursesr.delete');

    /**   VIDEO ROUTE  */
    Route::get('video', [VideoController::class,'index'])->name('index.video');
    Route::get('video/{id}', [VideoController::class,'edit'])->name('edit.video');
    Route::get('quiry_video', [VideoController::class,'search'])->name('search.video');
    Route::post('store_video', [VideoController::class,'store'])->name('video.store');
    Route::put('update_video/{id}', [VideoController::class,'update'])->name('video.update');
    Route::delete('delete_video/{id}', [VideoController::class,'delete'])->name('video.delete');

    /**    INQUIRE  */
    Route::get('inquire', [InquireController::class,'index'])->name('index.inquire');
    Route::delete('delete_inquire/{id}', [InquireController::class,'delete'])->name('inquire.delete');
    Route::get('quiry_inquire', [InquireController::class,'search'])->name('search.inquire');

    /** RATING */
    Route::get('rate', [RatingController::class,'index'])->name('index.rate');
    Route::get('quiry_rate', [RatingController::class,'search'])->name('search.rate');
    Route::delete('delete_rate/{id}', [RatingController::class,'destroy'])->name('rate.delete');
    /**USER */
    Route::get('/user', [App\Http\Controllers\HomeController::class, 'user'])->name('user.index');
    Route::get('/user/{id}', [App\Http\Controllers\HomeController::class, 'upuser'])->name('user.update');
    Route::get('quiry_user', [App\Http\Controllers\HomeController::class, 'search'])->name('search.user');
    Route::delete('delete_user/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('user.delete');
    /** benefit */
    Route::get('/benefit', [BenefitsController::class,'index'])->name('benfit.index');
    Route::get('benefit/{id}', [BenefitsController::class,'edit'])->name('benefit.edit');
    Route::get('quiry_benefit', [BenefitsController::class, 'search'])->name('search.benefit');
    Route::post('benefit_store', [BenefitsController::class,'store'])->name('benefit.store');
    Route::put('update_benefit/{id}', [BenefitsController::class,'update'])->name('benefit.update');
    Route::delete('delete_benefit/{id}', [BenefitsController::class,'delete'])->name('benefit.delete');
    /**QFA */
    Route::get('/qfa', [QFAController::class,'index'])->name('qfa.index');
    Route::get('qfa/{id}', [QFAController::class,'edit'])->name('qfa.edit');
    Route::get('quiry_qfa', [QFAController::class, 'search'])->name('search.qfa');
    Route::post('qfa_store', [QFAController::class,'store'])->name('qfa.store');
    Route::put('update_qfa/{id}', [QFAController::class,'update'])->name('qfa.update');
    Route::delete('delete_qfa/{id}', [QFAController::class,'delete'])->name('qfa.delete');
    /**GOLAS */
    Route::get('/goal', [GoalsController::class,'index'])->name('goal.index');
    Route::get('goal/{id}', [GoalsController::class,'edit'])->name('goal.edit');
    Route::get('quiry_goal', [GoalsController::class, 'search'])->name('search.goal');
    Route::post('goal_store', [GoalsController::class,'store'])->name('goal.store');
    Route::put('update_goal/{id}', [GoalsController::class,'update'])->name('goal.update');
    Route::delete('delete_goal/{id}', [GoalsController::class,'delete'])->name('goal.delete');
    /** achievement */
    Route::get('/achievement', [AchievementsController::class,'index'])->name('achievement.index');
    Route::get('quiry_achievement', [AchievementsController::class, 'search'])->name('search.achievement');
    Route::get('achievement/{id}', [AchievementsController::class,'edit'])->name('achievement.edit');
    Route::post('achievement_store', [AchievementsController::class,'store'])->name('achievement.store');
    Route::put('update_achievement/{id}', [AchievementsController::class,'update'])->name('achievement.update');
    Route::delete('delete_achievement/{id}', [AchievementsController::class,'delete'])->name('achievement.delete');
    /**Order */
    Route::get('orders', [OrderController::class,'index'])->name('index.orders');
    Route::get('quiry_orders', [OrderController::class,'search'])->name('search.orders');
    Route::get('update_orders/{id}', [OrderController::class,'uporder'])->name('orders.update');
    Route::delete('delete_orders/{id}', [OrderController::class,'delete'])->name('orders.delete');
    /**end dash board */

});

/** CONTACT US */
Route::get('contact_us', [InquireController::class,'index_web'])->name('contact.index');
Route::post('contact_store', [InquireController::class,'store'])->name('store.contact');
/**ABOUT _AS */
Route::get('about_as', [WebController::class,'about'])->name('about.index');

/** profile_user */
Route::group(['prefix' => 'profile', 'middleware' => [ 'auth','verified']], function ()
{
    Route::get('/', [ProfileController::class,'index'])->name('profile.index');
    Route::get('edit_profile/{id}', [ProfileController::class,'edit'])->name('profile.edit');
    Route::put('update_profile/{id}', [ProfileController::class,'update'])->name('profile.update');
    Route::put('update_profile1/{id}', [ProfileController::class,'update1'])->name('profile.update1');
    Route::get('my_courses', [ProfileController::class,'course'])->name('profile.course');
    Route::get('/my_order_history', [ProfileController::class,'history'])->name('profile.history');
    Route::get('/my_favourite', [ProfileController::class,'favourite'])->name('profile.favourite');
});

/**Courses */
Route::get('courses_section', [CoursesController::class,'index2'])->name('courses');
Route::post('courses_favourite_add/{id}', [FavoriteController::class,'store'])->name('store.fff')->middleware('auth');


/**rating courses */
Route::post('rate_store/{id}', [RatingController::class,'store'])->name('store.rate')->middleware(['CheckCoursePayment','auth']);

/**video */
Route::group(['prefix' => 'video', 'middleware' => ['auth','CheckCoursePayment','verified']], function ()
{
    Route::get('video_section/{id}', [VideoController::class,'index2'])->name('video');
});

/**Order_Place */
Route::get('/order/place/{id}', [OrderController::class,'index2'])->name('order.place')->middleware(['verified','auth']);
Route::post('/order/place/{id}', [OrderController::class,'store'])->name('order.store')->middleware(['verified','auth']);

Route::get('/generate_url/{id}',[UrlGeneratorController::class, 'generateUrl'])->name('generate_url')->middleware(['auth','CheckUserStatus']);
Route::get('/expired_url',[UrlGeneratorController::class, 'checkUrlExpiration'])->middleware(['auth']);


Route::get('videos/{videoName}', [VideoController::class,'show2'])->name('videos.show2')->middleware(['auth']);

/**GMAIL SIGN_IN */
Route::get('/google/redirect', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');

