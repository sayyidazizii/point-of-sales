<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\InvtItemController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\InvtItemUnitController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\InvtItemCategoryController;

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


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('/item-unit',[InvtItemUnitController::class, 'index'])->name('item-unit');
	Route::post('/item-unit/get-item-unit',[InvtItemUnitController::class, 'getItemUnit'])->name('get-item-unit');
	Route::get('/item-unit/add',[InvtItemUnitController::class, 'addInvtItemUnit'])->name('add-item-unit');
	Route::post('/item-unit/elements-add',[InvtItemUnitController::class, 'elementAddElementsInvtItemUnit'])->name('add-item-unit-elements');
	Route::post('/item-unit/process-add',[InvtItemUnitController::class,'processAddElementsInvtItemUnit'])->name('process-add');
	Route::get('/item-unit/reset-add',[InvtItemUnitController::class, 'addReset'])->name('add-reset-item-unit');
	Route::get('/item-unit/edit/{item_unit_id}', [InvtItemUnitController::class, 'editInvtItemUnit'])->name('edit-item-unit');
	Route::post('/item-unit/process-edit-item-unit', [InvtItemUnitController::class, 'processEditInvtItemUnit'])->name('process-edit-item-unit');
	Route::get('/item-unit/delete/{item_unit_id}', [InvtItemUnitController::class, 'deleteInvtItemUnit'])->name('delete-item-unit');

	Route::get('/item',[InvtItemController::class, 'index'])->name('item');
	Route::get('/item/add-item', [InvtItemController::class, 'addItem'])->name('add-item');
	Route::get('/item/add-reset', [InvtItemController::class, 'addResetItem'])->name('add-reset-item');
	Route::post('/item/add-item-elements', [InvtItemController::class, 'addItemElements'])->name('add-item-elements');
	Route::post('/item/process-add-item', [InvtItemController::class,'processAddItem'])->name('process-add-item');
	Route::get('/item/edit-item/{item_id}', [InvtItemController::class, 'editItem'])->name('edit-item');
	Route::post('/item/process-edit-item', [InvtItemController::class, 'processEditItem'])->name('process-edit-item');
	Route::get('/item/delete-item/{item_id}', [InvtItemController::class, 'deleteItem'])->name('delete-item');
	
	Route::get('/item-category',[InvtItemCategoryController::class, 'index'])->name('item-category');
	Route::get('/item-category/add',[InvtItemCategoryController::class, 'addItemCategory'])->name('add-item-category');
	Route::post('/item-category/elements-add',[InvtItemCategoryController::class, 'elementsAddItemCategory'])->name('elements-add-category');
	Route::post('/item-category/process-add-category', [InvtItemCategoryController::class, 'processAddItemCategory'])->name('process-add-item-category');
	Route::get('/item-category/reset-add',[InvtItemCategoryController::class, 'addReset'])->name('add-reset-category');
	Route::get('/item-category/edit-category/{item_category_id}', [InvtItemCategoryController::class, 'editItemCategory'])->name('edit-item-category');
	Route::post('/item-category/process-edit-item-category', [InvtItemCategoryController::class, 'processEditItemCategory'])->name('process-edit-item-category');
	Route::get('/item-category/delete-category/{item_category_id}', [InvtItemCategoryController::class, 'deleteItemCategory'])->name('delete-item-category');
	
	
	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');