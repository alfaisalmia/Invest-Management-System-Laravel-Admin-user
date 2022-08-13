<?php

use App\Http\Controllers\Admin\PlanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TimeSettingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ManageUsersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Gateway\PaymentController;
use App\Http\Controllers\Gateway\perfect_money\ProcessController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Admin\ManualGatewayController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\WithdrawalController;





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

Route::get('/', function () {
    return view('layouts.frontendTemplate.index');
});
Route::get('/about', function () {
    return view('layouts.frontendTemplate.about');
});
Route::get('/investment', function () {
    return view('layouts.frontendTemplate.investment');
});
Route::get('/faq', function () {
    return view('layouts.frontendTemplate.faq');
});
Route::get('/contact', function () {
    return view('layouts.frontendTemplate.contact');
});
Auth::routes();

Route::namespace('Gateway')->prefix('ipn')->name('ipn.')->group(function () {
    Route::post('perfect_money', [ProcessController::class, 'ipn'])->name('perfect_money');
});


//Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['admin'])->group(function () {
 */

/*
|--------------------------------------------------------------------------
| Start Admin Area
|--------------------------------------------------------------------------
*/
//Route::group(['prefix' => 'admin'], function () {
/* Route::name('admin.')->prefix('admin')->group(function () {
    Route::group(['middleware' => 'admin.guest'], function () { */


Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('auth');
        Route::get('logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');

        // Route::view('/login', 'admin.login')->name('login');
        Route::post('/login', [App\Http\Controllers\Admin\Auth\AdminController::class, 'authenticate'])->name('auth');
    });
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


        // Time Controller
        Route::get('time-setting', [TimeSettingController::class, 'index'])->name('time-setting');
        Route::get('time-setting/create', [TimeSettingController::class, 'create'])->name('time-create');
        Route::post('time-store', [TimeSettingController::class, 'store'])->name('time-store');
        Route::get('time-setting/edit/{id}', [TimeSettingController::class, 'edit'])->name('time-edit');
        Route::put('time-setting/{id}', [TimeSettingController::class, 'update'])->name('time-update');

        // Plan Controller
        Route::get('plan-setting', [PlanController::class, 'index'])->name('plan-setting');
        Route::get('plan-setting/edit/{id}', [PlanController::class, 'edit'])->name('plan-edit');
        Route::get('plan-setting/create', [PlanController::class, 'create'])->name('plan-create');
        Route::post('plan-setting/create', [PlanController::class, 'store'])->name('plan-store');
        Route::put('plan-setting/update/{id}', [PlanController::class, 'update'])->name('plan-update');

        // Users Manager
        Route::get('users', [ManageUsersController::class, 'allUsers'])->name('users.all');
        Route::get('users/active', [ManageUsersController::class, 'activeUsers'])->name('users.active');
        Route::get('users/banned', [ManageUsersController::class, 'bannedUsers'])->name('users.banned');
        Route::get('users/email-unverified', [ManageUsersController::class, 'emailUnverifiedUsers'])->name('users.emailUnverified');
        Route::get('users/sms-unverified', [ManageUsersController::class, 'smsUnverifiedUsers'])->name('users.smsUnverified');

        Route::get('user/detail/{id}', [ManageUsersController::class, 'detail'])->name('users.detail');
        Route::post('user/update/{id}', [ManageUsersController::class, 'update'])->name('users.update');
        Route::post('user/add-sub-balance/{id}', [ManageUsersController::class, 'addSubBalance'])->name('users.addSubBalance');



        // Login History
        Route::get('users/login/history', [ManageUsersController::class, 'loginHistory'])->name('users.login.history');
        Route::get('users/send-email', [ManageUsersController::class, 'showEmailAllForm'])->name('users.email.all');
        Route::post('users/send-email', [ManageUsersController::class, 'sendEmailAll'])->name('users.email.send');

        // General Setting
        Route::get('setting', [GeneralSettingController::class, 'index'])->name('setting.index');
        Route::post('setting', [GeneralSettingController::class, 'update'])->name('setting.update');
        Route::get('optimize', [GeneralSettingController::class, 'optimize'])->name('setting.optimize');


        // Logo-Icon
        Route::get('setting/logo-icon', [GeneralSettingController::class, 'logoIcon'])->name('setting.logo-icon');
        Route::post('setting/logo-icon', [GeneralSettingController::class, 'logoIconUpdate'])->name('setting.logo-icon');
        Route::get('user/invests/{id}', 'ManageUsersController@invests')->name('users.invests');


        // Deposit Module for Admin
        Route::get('deposit/gateway/manual', [ManualGatewayController::class, 'index'])->name('deposit_manual_index');
        Route::get('deposit/gateway/manual/new', [ManualGatewayController::class, 'create'])->name('deposit.manual.create');
        Route::get('deposit/pending', [DepositController::class, 'pending'])->name('deposit.pending');
        Route::get('deposit/approved', [DepositController::class, 'approved'])->name('deposit.approved');
        Route::get('/deposit/successful', [DepositController::class, 'successful'])->name('deposit.successful');
        Route::get('/deposit/rejected', [DepositController::class, 'rejected'])->name('deposit.rejected');
        Route::get('/deposit/all', [DepositController::class, 'alldeposit'])->name('deposit.alldeposit');

        // Withdrawal Module for Admin
        Route::get('withdraw/pending', [WithdrawalController::class,'pending'])->name('withdraw.pending');
        Route::get('withdraw/approved', [WithdrawalController::class,'approved'])->name('withdraw.approved');
        Route::get('withdraw/rejected', [WithdrawalController::class,'rejected'])->name('withdraw.rejected');
        Route::get('withdraw/log', [WithdrawalController::class,'log'])->name('withdraw.log');
        Route::get('withdraw/details/{id}', [WithdrawalController::class,'details'])->name('withdraw.details');


    });
});


/*
|--------------------------------------------------------------------------
| Start User Area
|--------------------------------------------------------------------------
*/

Route::name('user.')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('logout', [LoginController::class, 'logoutGet'])->name('userlogout');

    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
    Route::group(['middleware' => ['guest']], function () {
        Route::get('register/{reference}', 'Auth\RegisterController@referralRegister')->name('refer.register');
    });
});

Route::name('user.')->prefix('user')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('dashboard', [UserController::class, 'home'])->name('home');
        Route::get('plan', [UserController::class, 'investmentPlan'])->name('investmentPlan');

        Route::get('my-refferal', [UserController::class, 'myRefferals'])->name('myRefferals');

        ///Transaction
        Route::post('/plans', [UserController::class, 'buyPlan'])->name('buy.plan');
        Route::get('interest/log', [UserController::class, 'interestLog'])->name('interest.log');
        Route::get('deposit/log', [UserController::class, 'depositlog'])->name('deposit_log');
        Route::get('plan/log', [UserController::class, 'planlog'])->name('plan_log');

        //Deposit
        Route::get('deposit', [PaymentController::class, 'deposit'])->name('deposit');
        Route::post('deposit/insert', [PaymentController::class, 'depositInsert'])->name('deposit.insert');
        Route::get('deposit/preview', [PaymentController::class, 'depositPreview'])->name('deposit.preview');
        Route::get('deposit/confirm', [PaymentController::class, 'depositConfirm'])->name('deposit.confirm');
        //Balance Transfer
        Route::get('transfer-balance', [UserController::class, 'transfer'])->name('transfer.balance');
        Route::post('transfer-balance', [UserController::class, 'transferSubmit']);

        //Support Ticket
        Route::get('ticket', [TicketController::class, 'supportTicket'])->name('ticket');
        Route::get('ticket/new', [TicketController::class, 'openSupportTicket'])->name('newticket');
        Route::post('ticket/store', [TicketController::class, 'storeSupportTicket'])->name('ticket_store');
        Route::get('ticket/view/{ticket}', [TicketController::class, 'viewTicket'])->name('ticket_view');
        Route::put('/reply/{ticket}',  [TicketController::class, 'replyTicket'])->name('ticket_reply');
        //Change Password
        Route::get('change-password', [UserController::class, 'changePassword'])->name('change-password');
        Route::post('change-password', [UserController::class, 'submitPassword']);
    });
});
Route::get('placeholder-image/{size?}', 'SiteController@placeholderImage')->name('placeholderImage');
