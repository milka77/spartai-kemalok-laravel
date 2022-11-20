<?php

namespace App\Http\Controllers;

use App\Models\RaidTaxDifficulty;
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

// Admin Routes
Route::middleware('auth')->group(function() {
 
  Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

  // *******************************************
  // Role Routes
  // *******************************************
  Route::prefix('roles')->group(function() {
    Route::get('/', [RoleController::class, 'index'])->name('roles.index');
    
    Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/', [RoleController::class, 'store'])->name('roles.store');

    Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::patch('/{role}/update', [RoleController::class, 'update'])->name('roles.update');
  
    Route::delete('/{role}/destroy', [RoleController::class, 'destroy'])->name('roles.destroy');
  });

  // *******************************************
  // User Admin Routes
  // *******************************************
  Route::prefix('user')->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('user.index');

    Route::get('/{user}/show', [UserController::class, 'show'])->name('user.show');
    Route::patch('/{user}/update', [UserController::class, 'update'])->name('user.update');

    Route::delete('/{user}/delete', [UserController::class, 'destroy'])->name('user.destroy');

    Route::put('/{user}/attach', [UserController::class, 'attach'])->name('user.role.attach');
    Route::put('/{user}/detach', [UserController::class, 'detach'])->name('user.role.detach');
  });

  // *******************************************
  // News Admin Routes
  // *******************************************
  Route::prefix('news')->group(function() {
    // *******************************************
    // News routes
    // *******************************************
    Route::get('/', [NewsController::class, 'index'])->name('news.index');

    Route::get('/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/store', [NewsController::class, 'store'])->name('news.store');

    Route::get('/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::patch('/{news}/update', [NewsController::class, 'update'])->name('news.update');

    Route::delete('/{news}/destroy', [NewsController::class, 'destroy'])->name('news.destroy');
    // End of News Routes ------------------------


    // *******************************************
    // NewsCategory Routes
    // *******************************************
    Route::prefix('category')->group(function() {
      Route::get('/', [CategoryController::class, 'index'])->name('newscat.index');

      Route::get('/create', [CategoryController::class, 'create'])->name('newscat.create');
      Route::post('/store', [CategoryController::class, 'store'])->name('newscat.store');

      Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('newscat.edit');
      Route::patch('/{category}/update', [CategoryController::class, 'update'])->name('newscat.update');
      
      Route::delete('/{category}/destroy', [CategoryController::class, 'destroy'])->name('newscat.destroy');
    });
  });
  // End of News Admin Routes --------------------------------------------------


  // *******************************************
  // Raid Tax Admin Routes
  // *******************************************
  Route::prefix('raidtax')->group(function() {
    // *******************************************
    // Raid Tax routes
    // *******************************************
    Route::get('/', [RaidTaxController::class, 'adminindex'])->name('raidtax.adminindex');

    Route::get('/create', [RaidTaxController::class, 'create'])->name('raidtax.create');
    Route::post('/store', [RaidTaxController::class, 'store'])->name('raidtax.store');

    Route::get('/{raidTax}/edit', [RaidTaxController::class, 'edit'])->name('raidtax.edit');
    Route::patch('/{raidTax}/edit', [RaidTaxController::class, 'update'])->name('raidtax.update');

    Route::delete('/{raidTax}/destroy', [RaidTaxController::class, 'destroy'])->name('raidtax.destroy');

    // *******************************************
    // Raid Tax Category routes
    // *******************************************
    Route::prefix('category')->group(function() {
      Route::get('/', [RaidTaxCategoryController::class, 'index'])->name('raidtaxcat.index');

      Route::get('/create', [RaidTaxCategoryController::class, 'create'])->name('raidtaxcat.create');
      Route::post('/store', [RaidTaxCategoryController::class, 'store'])->name('raidtaxcat.store');

      Route::get('/{raidTaxCategory}/edit', [RaidTaxCategoryController::class, 'edit'])->name('raidtaxcat.edit');
      Route::patch('/{raidTaxCategory}/update', [RaidTaxCategoryController::class, 'update'])->name('raidtaxcat.update');
      
      Route::delete('/{raidTaxCategory}/destroy', [RaidTaxCategoryController::class, 'destroy'])->name('raidtaxcat.destroy');
    });


    // *******************************************
    // Raid Tax Difficulty routes
    // *******************************************
    Route::prefix('difficulty')->group(function() {
      Route::get('/', [RaidTaxDifficultyController::class, 'index'])->name('raidtaxdiff.index');

      Route::get('/create', [RaidTaxDifficultyController::class, 'create'])->name('raidtaxdiff.create');
      Route::post('/store', [RaidTaxDifficultyController::class, 'store'])->name('raidtaxdiff.store');

      Route::get('/{raidTaxDifficulty}/edit', [RaidTaxDifficultyController::class, 'edit'])->name('raidtaxdiff.edit');
      Route::patch('/{raidTaxDifficulty}/update', [RaidTaxDifficultyController::class, 'update'])->name('raidtaxdiff.update');
      
      Route::delete('/{raidTaxDifficulty}/destroy', [RaidTaxDifficultyController::class, 'destroy'])->name('raidtaxdiff.destroy');
    });
  });
  // End of Raid Tax Admin Routes --------------------------------------------
});
