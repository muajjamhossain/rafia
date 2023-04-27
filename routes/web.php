<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecycleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SelfProfileController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\GalleryCategoryController;
use App\Http\Controllers\NewsletterSubscribeController;


// Route::get('/', function () {
//     return view('welcome');
// });


// Route::group(['prefix' => 'crm', 'as' => 'crm.'], function () {

// });
// Route::controller(CustomerController::class)->prefix('customers')->group(function () {

// });


Route::group(['controller'=> WebsiteController::class], function () {
    Route::get('/', 'index')->name('index');
    Route::get('website/contact', 'contact')->name('contact');
    Route::get('website/about', 'about')->name('about');
    Route::get('website/doctors', 'doctors')->name('doctors');
    Route::get('website/gallery', 'gallery')->name('gallery');
    Route::get('website/apoinment-modal', 'apoinmentModal')->name('apoinment-modal');
    Route::get('website/get-speciality', 'getSpeciality')->name('get-speciality');
    Route::get('website/get-doctor/{id}', 'getDoctor')->name('get-doctor');
    Route::post('website/complain/store', 'store')->name('website.complain.store');
    Route::post('website/apoinment/store', 'storeApoinment')->name('website.apoinment.store');
});

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'dashboard'], function () {

    Route::group(['prefix' => 'profile', 'as' => 'profile.', 'controller'=> SelfProfileController::class], function () {
        Route::get('', 'index')->name('');
    });

    Route::group(['prefix' => '/', 'as' => '.', 'controller'=> DashboardController::class], function () {
        Route::get('permission', 'permission')->name('');
        Route::get('/', 'index')->name('');
    });

    Route::group(['prefix' => 'newsletter', 'as' => 'newsletter.', 'controller'=> NewsletterSubscribeController::class], function () {
        Route::get('/subscribe', 'index')->name('');
    });

    Route::group(['prefix' => 'speciality', 'as' => 'speciality.', 'controller'=> SpecialityController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/add', 'add')->name('');
        Route::get('/edit/{slug}', 'edit')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/submit', 'insert')->name('');
        Route::post('/update', 'update')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
    });

    Route::group(['prefix' => 'doctor', 'as' => 'doctor.', 'controller'=> DoctorController::class], function () {
        Route::get('/contact', 'contact')->name('contact');
        Route::get('', 'index')->name('');
        Route::get('/add', 'add')->name('');
        Route::get('/edit/{doctor}', 'edit')->name('');
        Route::get('/view/{doctor}', 'view')->name('');
        Route::post('/submit', 'insert')->name('');
        Route::post('/update', 'update')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
    });

    Route::group(['prefix' => 'user', 'as' => 'user.', 'controller'=> UserController::class], function () {
        Route::get('/contact', 'contact')->name('contact');
        Route::get('', 'index')->name('');
        Route::get('/add', 'add')->name('');
        Route::get('/edit/{user}', 'edit')->name('');
        Route::get('/view/{user}', 'view')->name('');
        Route::post('/submit', 'insert')->name('');
        Route::post('/update', 'update')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
    });

    Route::group(['prefix' => 'banner', 'as' => 'banner.', 'controller'=> BannerController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/add', 'add')->name('');
        Route::get('/edit/{slug}', 'edit')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/submit', 'insert')->name('');
        Route::post('/update', 'update')->name('');
        Route::post('/publish', 'publish')->name('');
        Route::post('/unpublish', 'unpublish')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
    });

    Route::group(['prefix' => 'manage', 'as' => 'manage.', 'controller'=> ManageController::class], function () {
        Route::get('/basic', 'basic')->name('');
        Route::post('/basic/update', 'update_basic')->name('');
        Route::get('/social', 'social_media')->name('');
        Route::post('/social/update', 'update_social_media')->name('');
        Route::get('/contact', 'contact')->name('');
        Route::post('/contact/update', 'update_contact')->name('');
        Route::get('/copyright', 'copyright')->name('');
        Route::post('/copyright/update', 'update_copyright')->name('');
    });

    Route::group(['prefix' => 'gallery/category', 'as' => 'gallery.category.', 'controller'=> GalleryCategoryController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/add', 'add')->name('');
        Route::get('/edit/{slug}', 'edit')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/submit', 'insert')->name('');
        Route::post('/update', 'update')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
    });

    Route::group(['prefix' => 'gallery', 'as' => 'gallery.', 'controller'=> GalleryController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/add', 'add')->name('');
        Route::get('/edit/{slug}', 'edit')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/submit', 'insert')->name('');
        Route::post('/update', 'update')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
    });

    Route::group(['prefix' => 'blog/post', 'as' => 'blog.post.', 'controller'=> BlogPostController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/add', 'add')->name('');
        Route::get('/edit/{slug}', 'edit')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/submit', 'insert')->name('');
        Route::post('/update', 'update')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
    });

    Route::group(['prefix' => 'blog/category', 'as' => 'blog.category.', 'controller'=> BlogCategoryController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/add', 'add')->name('');
        Route::get('/edit/{slug}', 'edit')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/submit', 'insert')->name('');
        Route::post('/update', 'update')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
    });

    Route::group(['prefix' => 'blog/tag', 'as' => 'blog.tag.', 'controller'=> TagController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/add', 'add')->name('');
        Route::get('/edit/{slug}', 'edit')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/submit', 'insert')->name('');
        Route::post('/update', 'update')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
    });

    Route::group(['prefix' => 'service', 'as' => 'service.', 'controller'=> ServiceController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/add', 'add')->name('');
        Route::get('/edit/{slug}', 'edit')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/submit', 'insert')->name('');
        Route::post('/update', 'update')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
    });

    Route::group(['prefix' => 'video', 'as' => 'video.', 'controller'=> VideoController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/add', 'add')->name('');
        Route::get('/edit/{slug}', 'edit')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/submit', 'insert')->name('');
        Route::post('/update', 'update')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
    });


    Route::group(['prefix' => 'event', 'as' => 'event.', 'controller'=> EventController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/add', 'add')->name('');
        Route::get('/edit/{slug}', 'edit')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/submit', 'insert')->name('');
        Route::post('/update', 'update')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
    });

    Route::group(['prefix' => 'team', 'as' => 'team.', 'controller'=> TeamController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/add', 'add')->name('');
        Route::get('/edit/{slug}', 'edit')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/submit', 'insert')->name('');
        Route::post('/update', 'update')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
    });

    Route::group(['prefix' => 'partner', 'as' => 'partner.', 'controller'=> PartnerController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/add', 'add')->name('');
        Route::get('/edit/{slug}', 'edit')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/submit', 'insert')->name('');
        Route::post('/update', 'update')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
    });

    Route::group(['prefix' => 'client', 'as' => 'client.', 'controller'=> ClientController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/add', 'add')->name('');
        Route::get('/edit/{slug}', 'edit')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/submit', 'insert')->name('');
        Route::post('/update', 'update')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
    });

// Route::group(['prefix' => 'user', 'as' => 'user.', 'controller'=> UserController::class], function () {});
    Route::group(['prefix' => 'testimonial', 'as' => 'testimonial.', 'controller'=> TestimonialController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/add', 'add')->name('');
        Route::get('/edit/{slug}', 'edit')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/submit', 'insert')->name('');
        Route::post('/update', 'update')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
    });

    Route::group(['prefix' => 'faq', 'as' => 'faq.', 'controller'=> FaqController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/add', 'add')->name('');
        Route::get('/edit/{slug}', 'edit')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/submit', 'insert')->name('');
        Route::post('/update', 'update')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
    });

    Route::group(['prefix' => 'appointment', 'as' => 'appointment.', 'controller'=> AppointmentController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
        Route::get('/allprint', 'allprint')->name('');
        Route::get('/print/{slug}', 'print')->name('');
        Route::get('/excel', 'export')->name('');
        Route::get('/pdf', 'pdf')->name('');
    });

    Route::group(['prefix' => 'complain', 'as' => 'complain.', 'controller'=> ComplainController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
        Route::get('/allprint', 'allprint')->name('');
        Route::get('/print/{slug}', 'print')->name('');
        Route::get('/excel', 'export')->name('');
        Route::get('/pdf', 'pdf')->name('');
    });

    Route::group(['prefix' => 'contactus', 'as' => 'contactus.', 'controller'=> ContactUsController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
        Route::get('/allprint', 'allprint')->name('');
        Route::get('/print/{slug}', 'print')->name('');
        Route::get('/excel', 'export')->name('');
        Route::get('/pdf', 'pdf')->name('');
    });


    Route::group(['prefix' => 'recycle', 'as' => 'recycle.', 'controller'=> RecycleController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/user', 'user')->name('');
        Route::get('/banner', 'banner')->name('');
        Route::get('/contactus', 'contactus')->name('');
        Route::get('/appointment', 'appointment')->name('');
        Route::get('/doctor', 'doctor')->name('');
        Route::get('/service', 'service')->name('');
        Route::get('/video', 'video')->name('');
        Route::get('/event', 'event')->name('');
        Route::get('/team', 'team')->name('');
        Route::get('/partner', 'partner')->name('');
        Route::get('/client', 'client')->name('');
        Route::get('/gallery', 'gallery')->name('');
        Route::get('/gallery/category', 'gallery_category')->name('');
        Route::get('/testimonial', 'testimonial')->name('');
        Route::get('/faq', 'faq')->name('');
        Route::get('/blog/post', 'post')->name('');
        Route::get('/blog/category', 'blog_category')->name('');
        Route::get('/blog/tag', 'tag')->name('');
    });

});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
