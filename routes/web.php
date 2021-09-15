<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return 'First sub domain';
})->domain('blog.' . env('APP_URL'));

Route::domain('blog.' . env('APP_URL'))->group(function () {
    Route::get('posts', function () {
        return 'Second subdomain landing page';
    });
    Route::get('post/{id}', function ($id) {
        return 'Post ' . $id . ' in second subdomain';
    });
});

Route::domain('{username}.' . env('APP_URL'))->group(function () {
    Route::get('post/{id}', function ($username, $id) {
        return 'User ' . $username . ' is trying to read post ' . $id;
    });
});
