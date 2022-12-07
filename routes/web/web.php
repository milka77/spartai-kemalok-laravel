<?php

namespace App\Http\Controllers;

use App\Models\RaidTax;
use App\Models\RaidTaxCategory;
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

// Public Routes
Route::get('/', [GuildController::class, 'index'])->name('home');

Route::get('/register', [UserController::class, 'register'])->name('user.register');
Route::post('/register', [UserController::class, 'store']);
Route::get('/login', [UserController::class, 'loginForm'])->name('user.login');
Route::post('/login', [UserController::class, 'loginUser']);

Route::get('/guild/roster', [GuildController::class, 'roster'])->name('guild.roster');
Route::get('/guild/recruitment', [GuildController::class, 'recruitment'])->name('guild.recruitment');
Route::get('/guild/{name}/raiderio', [GuildController::class, 'raiderio'])->name('guild.raiderio');
Route::get('/guild/raider', [GuildController::class, 'raider'])->name('guild.raider');
Route::get('/guild/kisokos', [GuildController::class, 'kisokos'])->name('guild.kisokos');

Route::get('/raidtax', [RaidTaxController::class, 'index'])->name('raidtax.index');
Route::get('/raidtax/{raidTaxCategory}/show-raid', [RaidTaxController::class, 'categoryShow'])->name('raidtax.cat.show');
Route::get('/raidtax/{raidTax}/show', [RaidTaxController::class, 'show'])->name('raidtax.show');

// Route::get('raidtax/{category_id}/{difficulty_id}', function ($category_id, $difficulty_id) {
//     $raidtax = RaidTax::where('raid_tax_category_id',$category_id)->where('raid_tax_difficulty_id', $difficulty_id)->get();
//     return response()->json($raidtax);
// });

Route::middleware('auth')->group(function() {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});



