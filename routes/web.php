<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UserController;
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

Route::get('/', [AuthController::class, 'login'])->name('login'); 
Route::post('/authenticateUser', [AuthController::class, 'authenticateUser']); 
Route::get('/logout', [AuthController::class, 'logout']); 
Route::any('/reset_password/{token}', [AuthController::class, 'resetPassword']); 

Route::get('/dashboard', [DashboardController::class, 'dashboard']);  
Route::get('/manage-organization', [OrganizationController::class, 'manageOrganization']);  
Route::get('/add-organization', [OrganizationController::class, 'addOrganization']);  
Route::post('/add-organization', [OrganizationController::class, 'registerOrganization']); 
Route::get('/edit-organization/{organization_id}', [OrganizationController::class, 'editOrganization']);  
Route::post('/update-organization', [OrganizationController::class, 'updateOrganization']); 


Route::get('/manage-users', [UserController::class, 'manageUser']);  
Route::get('/add-user', [UserController::class, 'addUser']);  
Route::post('/add-user', [UserController::class, 'registerUser']); 
Route::get('/edit-user/{users_id}', [UserController::class, 'editUser']);  
Route::post('/update-user', [UserController::class, 'updateUser']); 



//@Rsr
Route::get('/register', [UserController::class, 'newRegisteration']);
Route::post('/addOrganization', [UserController::class, 'addOrganization']);  



