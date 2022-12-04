<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;   
use App\Http\Controllers\Frontend\IndexController;   
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/admin', function () {
    return view('welcome');
});

//using group route with prefix and middleware

Route::group(['prefix'=> 'admin', ['middleware'=>'admin:admin']], function (){

    Route::get('/login',[AdminController::class, 'loginForm']);
    Route::post('/login',[AdminController::class,'store'])->name('admin.login');

});

//Admin dashboard, we change the gaurd here with admin 

Route::middleware([
    'auth:sanctum,admin',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile',[AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit',[AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::POST('/admin/profile/store',[AdminProfileController::class,'AdminProfileStore'])->name('admin.profile.store');
Route::get('/change/password/',[AdminProfileController::class, 'AdminChangePassword'])->name('change.password');
Route::POST('/update/password/',[AdminProfileController::class, 'AdminUpdateChangePassword'])->name('admin.update.password');


//User dashboard, we change the gaurd here with user 


Route::middleware([
    'auth:sanctum,web',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
//THIS IS SOMETHING NEW WE WANT TO SHOW USER IMAGE ON DASHBOARD
        $uid = Auth::user()->id;
        $user = User::find($uid);
        return view('dashboard',compact('user'));

       
//THIS IS SOMETHING NEW WE WANT TO SHOW USER IMAGE ON DASHBOARD

    })->name('dashboard');
});

// All user routes here.........

Route::get('/',[IndexController::class,'index']); //this is home controller

Route::get('/user/logout',[IndexController::class,'UserLogout'])->name('user.logout');
Route::get('/user/profile',[IndexController::class,'UserProfile'])->name('user.profile');
Route::post('/user/profile/store',[IndexController::class,'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password',[IndexController::class,'UserChangePassword'])->name('user.change.password');
Route::post('/user/password/updated',[IndexController::class,'UserPasswordUpdate'])->name('user.password.update');