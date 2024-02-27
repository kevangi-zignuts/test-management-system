<?php
// require_once app_path('Http/Controllers/Auth/AdminController.php');
// Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Security\RolePermission;
use App\Http\Controllers\Security\RoleController;
use App\Http\Controllers\Security\PermissionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\TestController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\UsersController;
// Packages
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

Route::get('/storage', function () {
    Artisan::call('storage:link');
});


//Landing-Pages Routes
Route::group(['prefix' => 'landing-pages'], function() {
Route::get('index',[HomeController::class, 'landing_index'])->name('landing-pages.index');
Route::get('blog',[HomeController::class, 'landing_blog'])->name('landing-pages.blog');
Route::get('blog-detail',[HomeController::class, 'landing_blog_detail'])->name('landing-pages.blog-detail');
Route::get('about',[HomeController::class, 'landing_about'])->name('landing-pages.about');
Route::get('contact',[HomeController::class, 'landing_contact'])->name('landing-pages.contact');
Route::get('ecommerce',[HomeController::class, 'landing_ecommerce'])->name('landing-pages.ecommerce');
Route::get('faq',[HomeController::class, 'landing_faq'])->name('landing-pages.faq');
Route::get('feature',[HomeController::class, 'landing_feature'])->name('landing-pages.feature');
Route::get('pricing',[HomeController::class, 'landing_pricing'])->name('landing-pages.pricing');
Route::get('saas',[HomeController::class, 'landing_saas'])->name('landing-pages.saas');
Route::get('shop',[HomeController::class, 'landing_shop'])->name('landing-pages.shop');
Route::get('shop-detail',[HomeController::class, 'landing_shop_detail'])->name('landing-pages.shop-detail');
Route::get('software',[HomeController::class, 'landing_software'])->name('landing-pages.software');
Route::get('startup',[HomeController::class, 'landing_startup'])->name('landing-pages.startup');
});

//UI Pages Routs
Route::get('/', [HomeController::class, 'uisheet'])->name('uisheet');

Route::group(['middleware' => 'auth'], function () {
    // Permission Module
    Route::get('/role-permission',[RolePermission::class, 'index'])->name('role.permission.list');
    Route::resource('permission',PermissionController::class);
    Route::resource('role', RoleController::class);

    // Dashboard Routes
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Users Module
    Route::resource('users', UserController::class);

    // Route::group(['prefix' => 'admin'], function(){
    //     Route::get('/login', [AdminController::class, 'showLoginForm']);
    //     Route::post('/login', [AdminController::class, 'login']);
    //     Route::post('/logout', [AdminController::class, 'logout']);
    // });
});

//App Details Page => 'Dashboard'], function() {
Route::group(['prefix' => 'menu-style'], function() {
    //MenuStyle Page Routs
    Route::get('horizontal', [HomeController::class, 'horizontal'])->name('menu-style.horizontal');
    Route::get('dual-horizontal', [HomeController::class, 'dualhorizontal'])->name('menu-style.dualhorizontal');
    Route::get('dual-compact', [HomeController::class, 'dualcompact'])->name('menu-style.dualcompact');
    Route::get('boxed', [HomeController::class, 'boxed'])->name('menu-style.boxed');
    Route::get('boxed-fancy', [HomeController::class, 'boxedfancy'])->name('menu-style.boxedfancy');
});

//App Details Page => 'special-pages'], function() {
Route::group(['prefix' => 'special-pages'], function() {
    //Example Page Routs
    Route::get('billing', [HomeController::class, 'billing'])->name('special-pages.billing');
    Route::get('calender', [HomeController::class, 'calender'])->name('special-pages.calender');
    Route::get('kanban', [HomeController::class, 'kanban'])->name('special-pages.kanban');
    Route::get('pricing', [HomeController::class, 'pricing'])->name('special-pages.pricing');
    Route::get('rtl-support', [HomeController::class, 'rtlsupport'])->name('special-pages.rtlsupport');
    Route::get('timeline', [HomeController::class, 'timeline'])->name('special-pages.timeline');
});

//Widget Routs
Route::group(['prefix' => 'widget'], function() {
    Route::get('widget-basic', [HomeController::class, 'widgetbasic'])->name('widget.widgetbasic');
    Route::get('widget-chart', [HomeController::class, 'widgetchart'])->name('widget.widgetchart');
    Route::get('widget-card', [HomeController::class, 'widgetcard'])->name('widget.widgetcard');
});

//Maps Routs
Route::group(['prefix' => 'maps'], function() {
    Route::get('google', [HomeController::class, 'google'])->name('maps.google');
    Route::get('vector', [HomeController::class, 'vector'])->name('maps.vector');
});

//Auth pages Routs
Route::group(['prefix' => 'auth'], function() {
    Route::get('signin', [HomeController::class, 'signin'])->name('auth.signin');
    Route::get('signup', [HomeController::class, 'signup'])->name('auth.signup');
    Route::get('confirmmail', [HomeController::class, 'confirmmail'])->name('auth.confirmmail');
    Route::get('lockscreen', [HomeController::class, 'lockscreen'])->name('auth.lockscreen');
    Route::get('recoverpw', [HomeController::class, 'recoverpw'])->name('auth.recoverpw');
    Route::get('userprivacysetting', [HomeController::class, 'userprivacysetting'])->name('auth.userprivacysetting');
});

//Error Page Route
Route::group(['prefix' => 'errors'], function() {
    Route::get('error404', [HomeController::class, 'error404'])->name('errors.error404');
    Route::get('error500', [HomeController::class, 'error500'])->name('errors.error500');
    Route::get('maintenance', [HomeController::class, 'maintenance'])->name('errors.maintenance');
});


//Forms Pages Routs
Route::group(['prefix' => 'forms'], function() {
    Route::get('element', [HomeController::class, 'element'])->name('forms.element');
    Route::get('wizard', [HomeController::class, 'wizard'])->name('forms.wizard');
    Route::get('validation', [HomeController::class, 'validation'])->name('forms.validation');
});


//Table Page Routs
Route::group(['prefix' => 'table'], function() {
    Route::get('bootstraptable', [HomeController::class, 'bootstraptable'])->name('table.bootstraptable');
    Route::get('datatable', [HomeController::class, 'datatable'])->name('table.datatable');
});

//Icons Page Routs
Route::group(['prefix' => 'icons'], function() {
    Route::get('solid', [HomeController::class, 'solid'])->name('icons.solid');
    Route::get('outline', [HomeController::class, 'outline'])->name('icons.outline');
    Route::get('dualtone', [HomeController::class, 'dualtone'])->name('icons.dualtone');
    Route::get('colored', [HomeController::class, 'colored'])->name('icons.colored');
});
//Extra Page Routs
Route::get('privacy-policy', [HomeController::class, 'privacypolicy'])->name('pages.privacy-policy');
Route::get('terms-of-use', [HomeController::class, 'termsofuse'])->name('pages.term-of-use');


//Admin Side Test Page Routs
Route::group(['prefix' => 'test'], function(){
    Route::get('/create', [TestController::class, 'create'])->name('test.create');
    Route::post('/add', [TestController::class, 'store'])->name('store');
    Route::get('/index', [TestController::class, 'show'])->name('show');
    Route::get('/view/{id}', [TestController::class, 'view'])->name('view');
    Route::get('/edit/{id}', [TestController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [TestController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [TestController::class, 'delete'])->name('delete');
});

//Admin Side Question Page Routs
Route::group(['prefix' => 'questions'], function(){
    Route::get('/create/{id}', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/store', [QuestionController::class, 'store'])->name('questions.store');
    Route::get('/show/{id}', [QuestionController::class, 'show'])->name('questions.show');
    Route::get('/view/{id}', [QuestionController::class, 'view'])->name('questions.view');
    Route::get('/edit/{id}', [QuestionController::class, 'edit'])->name('questions.edit');
    Route::put('/update/{id}', [QuestionController::class, 'update'])->name('questions.update');
    Route::delete('/delete/{id}', [QuestionController::class, 'delete'])->name('questions.delete');
});

Route::group(['prefix' => 'user'], function(){
    Route::get('/index', [UsersController::class, 'index'])->name('user.index');
    Route::get('/test/{id}', [UsersController::class, 'test'])->name('user.test');
    Route::post('/result/{id}', [UsersController::class, 'result'])->name('user.result');
});
