<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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
    return redirect('admin/dashboard');
});

Route::get('/admin', function () {
    return redirect('dashboard');
});
Route::get('/user', function () {
    return redirect('dashboard');
});

Route::group(['prefix' => 'admin'], function () {

       Route::get('/dashboard', function (){
        if(Auth::check()){
   return view('admin.dashboard');
        } else{
             return view('admin.auth.login');
        }
    })->name('dashboard');
            // dd(Auth::check());
        Route::get('/', function () {
    if(Auth::check()){
               return redirect('admin/dashboard');      
        } else{
         
                return redirect('admin/login');      
        }
   });
});
Route::group(['prefix' => 'user'], function () {

       Route::get('/dashboard', function (){
        if(Auth::check()){
   return view('user.dashboard');
        } else{
             return view('user.auth.login');
        }
    })->name('dashboard');
            // dd(Auth::check());
        Route::get('/', function () {
    if(Auth::check()){
               return redirect('user/dashboard');      
        } else{
         
                return redirect('user/login');      
        }
   });
});
Route::get('admin/login',[AdminController::class,'login'])->name('login');
Route::get('user/login',[AdminController::class,'loginUser'])->name('login_user');
Route::get('user/change-password',[AdminController::class,'userChangePass'])->name('user_change_pass');
Route::post('user/change-password',[AdminController::class,'change_password'])->name('change_password');

// Route::get('admin/login',[AdminController::class,'login'])->name('admin_login');

Route::post('/dologin',[AdminController::class,'authenticate'])->name('dologin');
Route::post('/dologin_user',[AdminController::class,'userAuthenticate'])->name('dologin_user');
Route::get('/logout',[AdminController::class,'getLogout'])->name('logout');
Route::get('/logout',[AdminController::class,'getLogoutUser'])->name('logout_user');




// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','middleware' => ['AdminAuth']], function () {
    Route::get('dashboard', [AdminController::class,'index'])->name('admin');
    Route::get('users', [AdminController::class,'users'])->name('users');
    Route::get('add_users', [AdminController::class,'addUsers'])->name('add_users');
    Route::post('add_users', [AdminController::class,'addUsersPost'])->name('add_users');
    Route::get('tasks', [AdminController::class,'tasks'])->name('task');
    Route::get('export_task', [AdminController::class,'exportTask'])->name('export_task');
    Route::get('autoGen', [AdminController::class,'autoGen'])->name('autoGen');
    });

Route::group(['prefix'=>'user','middleware' => ['UserAuth']], function () {
    Route::get('dashboard', [AdminController::class,'userindex'])->name('user');
    // Route::get('users', [AdminController::class,'users'])->name('users');
    Route::get('add_tasks', [AdminController::class,'addTasks'])->name('add_tasks');
    Route::post('add_tasks', [AdminController::class,'addTaskPost'])->name('add_tasks');
    Route::get('tasks', [AdminController::class,'userTasks'])->name('tasks');
    Route::get('autoGen', [AdminController::class,'autoGen'])->name('autoGen');
    });