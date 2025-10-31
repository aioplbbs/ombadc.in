<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepartmentWebsiteController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PersonalProfileController;
use App\Http\Controllers\RepositoryController;

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

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/pages/{slug}', [FrontController::class, 'page'])->name('pages');
Route::get('/faculties/{slug}', [FrontController::class, 'faculty']);
Route::get('/profile/{slug}', [FrontController::class, 'profile']);
Route::get('/galleries/{slug?}', [FrontController::class, 'gallery']);
Route::get('/all/{slug}', [FrontController::class, 'all']);
Route::get('/history', [FrontController::class, 'history']);
Route::get('/purpose-of-spv', [FrontController::class, 'purpose']);
Route::get('/organogram', [FrontController::class, 'organogram']);

Route::get('/setup', [SetupController::class, 'index']);
Route::post('/setup', [SetupController::class, 'create'])->name('setup.init');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    Route::resource('/banner', BannerController::class);
    Route::resource('/notice', NoticeController::class)->except(['show']);
    Route::resource('/gallery', GalleryController::class)->except(['show']);
    Route::delete('/gallery/{gallery}/image-destroy/{gid}', [GalleryController::class, 'imageDestroy'])->name('gallery.image_destroy');
    Route::resource('/page', PageController::class)->except(['show']);
    Route::delete('/page/{page}/image-destroy/{gid}', [PageController::class, 'imageDestroy'])->name('page.image_destroy');
    Route::prefix('menus')->group(function () {
        Route::get('/', [MenusController::class, 'index'])->name('menus.index');
        Route::post('/', [MenusController::class, 'store'])->name('menus.store');
        Route::put('/{setting}', [MenusController::class, 'update'])->name('menus.update');
        Route::delete('/{setting}', [MenusController::class, 'destroy'])->name('menus.destroy');
        Route::resource('{setting}/menu', MenuController::class)->except(['show']);
        Route::post('{setting}/menu/update-position', [MenuController::class, 'updatePosition'])->name('menus.update_position');
    });
    Route::resource('/sector', SectorController::class)->except(['show']);
    Route::delete('/sector/{sector}/image-destroy/{gid}', [SectorController::class, 'imageDestroy'])->name('sector.image_destroy');
    Route::resource('/department', DepartmentController::class)->except(['show']);
    Route::resource('/district', DistrictController::class)->except(['show']);
    Route::resource('/project', ProjectController::class)->except(['show']);
    Route::post('/project/department', [ProjectController::class, 'getDepartmentsBySector'])->name('project.department');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');

    Route::resource('personal-profile', PersonalProfileController::class)->except(['show']);
    Route::post('personal-profile/update-position', [PersonalProfileController::class, 'updatePosition'])->name('personal-profile.update-position');

    Route::resource('document', DocumentController::class)->except(['show']);
    Route::resource('repository', RepositoryController::class)->except(['show']);
    Route::resource('article', ArticleController::class)->except(['show']);
    Route::resource('department-website', DepartmentWebsiteController::class)->except(['show']);

    Route::resource('/users', UserController::class);
    Route::resource('/permission', PermissionController::class);
    Route::post('/permission/assign', [PermissionController::class, 'permissionToRoll'])->name('permission.assign');
    Route::resource('/roles', RolesController::class);
});