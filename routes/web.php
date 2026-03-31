
<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return redirect('posts');
});

Route::resource('posts', PostController::class);
// Route::resource('page', PageController::class);

Route::controller(PageController::class)->group(function () {
    // URL Path ---------------------> Method Name in Controller
    Route::get('/latest-updates', 'latestUpdate')->name('pages.updates');
    Route::get('/results', 'results')->name('pages.results');
    Route::get('/vacancy-notifications', 'vacancy_Notification')->name('pages.vacancyNotification');
    Route::get('/exam-city-admit-card', 'admitCard')->name('pages.admitCard');
    Route::get('/study-resource', 'resource')->name('pages.resource');
    Route::get('/dept/{dept}','departmentWise')->name('pages.dept');
});
