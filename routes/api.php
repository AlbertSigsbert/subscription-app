<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/websites', [WebsiteController::class, 'index']);
Route::post('/websites/{website}/subscribe', [SubscriberController::class, 'store']);
Route::post('/websites/{website}/unsubscribe/{subscriber:email}', [SubscriberController::class, 'destroy']);
Route::get('/websites/{website}/posts', [PostController::class, 'index']);
Route::post('/websites/{website}/posts', [PostController::class, 'store']);

