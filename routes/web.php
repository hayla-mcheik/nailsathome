<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Controller Imports
|--------------------------------------------------------------------------
*/

// Frontend Controllers
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\TransportationController;
use App\Http\Controllers\ProfileController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\PackageController as AdminPackageController;
use App\Http\Controllers\Admin\ServiceVariantController;
use App\Http\Controllers\Admin\TransportationController as AdminTransportationController;
use App\Http\Controllers\Admin\TransportationFeeController;

// New Admin CMS Controllers
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AboutImageController;
use App\Http\Controllers\Admin\BrochureServiceController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HairAtHomeController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\SpaTreatmentController;
use App\Http\Controllers\Admin\SpecialOccasion;
use App\Http\Controllers\Admin\SpoilYourFeetController;
use App\Http\Controllers\Admin\TurnBackTimeController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontendController::class, 'home'])->name('home');

Route::controller(FrontendController::class)->group(function () {
    Route::get('/about', 'about')->name('about');
    Route::get('/treatyourself', 'treatyourself')->name('treatyourself');
    Route::get('/spoilyourfeet', 'spoilyourfeet')->name('spoilyourfeet');
    Route::get('/cantsayenough', 'cantsayenough')->name('cantsayenough');
    Route::get('/gorgeousnails', 'gorgeousnails')->name('gorgeousnails');
    Route::get('/leavemesoft', 'leavemesoft')->name('leavemesoft');
    Route::get('/cantsayenough', 'cantsayenough')->name('cantsayenough');
    Route::get('/whatyouknead', 'whatyouknead')->name('whatyouknead');
    Route::get('/turnbacktime', 'turnbacktime')->name('turnbacktime');
    Route::get('/hairathome', 'hairathome')->name('hairathome');
    Route::get('/policy', 'policy')->name('policy');
    Route::get('/transportationfees', 'transportationfees')->name('transportationfees');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/services', 'services')->name('services');
    Route::get('/services/{service}', 'serviceshow')->name('serviceshow');
    Route::get('/category/{category}', 'categoryServices')->name('category.services');
});

Route::prefix('packages')->name('packages.')->group(function () {
    Route::get('/', [PackageController::class, 'index'])->name('index');
    Route::get('/{package}', [PackageController::class, 'show'])->name('show');
});

Route::get('/transportation', [TransportationController::class, 'index'])
    ->name('transportation.index');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes (Dashboard & Profile)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Management Routes (Full CMS)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {

        // Core Resources
        Route::resource('categories', CategoryController::class);
        Route::resource('services', AdminServiceController::class);
        Route::resource('packages', AdminPackageController::class);

        // Sliders, Testimonials, and Gallery (Full CRUD)
        Route::resource('sliders', SliderController::class);
        Route::resource('testimonials', TestimonialController::class);
        Route::resource('gallery', GalleryController::class);
Route::resource('hair-at-home', HairAtHomeController::class);
        // About Section Management
        Route::get('about', [AboutController::class, 'index'])->name('about.index');
        Route::post('about', [AboutController::class, 'update'])->name('about.update');
        
        // About Images (Specific to the About Section Slider)
        Route::post('about-images', [AboutImageController::class, 'store'])->name('about-images.store');
        Route::delete('about-images/{aboutImage}', [AboutImageController::class, 'destroy'])->name('about-images.destroy');
// New Spa Experience Routes
    Route::resource('spa-treatments', SpaTreatmentController::class);
    Route::resource('spoil-yourfeet', SpoilYourFeetController::class);
   Route::post('special-occasions/{specialoccasion}', [SpecialOccasion::class, 'update'])
            ->name('special-occasions.update-post');

        Route::resource('special-occasions', SpecialOccasion::class);
    Route::resource('turnbacktime', TurnBackTimeController::class);
    Route::resource('brochure', BrochureServiceController::class);
    Route::resource('policies', PolicyController::class);
        // Transportation Management
        Route::controller(AdminTransportationController::class)->group(function () {
            Route::get('transportation', 'index')->name('transportation.index');
            Route::post('transportation', 'store')->name('transportation.store');
            Route::delete('transportation/{area}', 'destroy')->name('transportation.destroy');
        });

        Route::put('transportation-fee/{area}', [TransportationFeeController::class, 'update'])
            ->name('transportation-fee.update');

        // Service Variants (Nested under Services)
        Route::prefix('services/{service}')
            ->name('services.')
            ->group(function () {
                Route::get('variants', [ServiceVariantController::class, 'index'])->name('variants.index');
                Route::post('variants', [ServiceVariantController::class, 'store'])->name('variants.store');
            });

        Route::delete('variants/{variant}', [ServiceVariantController::class, 'destroy'])
            ->name('variants.destroy');
    });

require __DIR__ . '/auth.php';