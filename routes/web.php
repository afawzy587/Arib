<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login\CustomAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\web\CityController;
// Route For Change Lang AR ,EN
  Route::get('welcome/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'ar'])) {
      abort(400);
    }
    session::Put('locale', $locale);
    return redirect()->back();
  });
  Route::get('/', [CustomAuthController::class, 'index'])->name('login');
  Route::post('/', [CustomAuthController::class, 'PostLogin'])->name('login');
  Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/logout', [CustomAuthController::class, 'signOut'])->name('logout');
    Route::get('/home', [DashboardController::class, 'home'])->name('home');
  });
// Route Users

  Route::resource('users', CityController::class);
