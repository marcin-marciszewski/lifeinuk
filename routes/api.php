<?php

use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\AnswersController;
use App\Http\Controllers\DatesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\AuthController;

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
// Public routes
// Route::resource('questions', QuestionsController::class);
// Route::resource('answers', AnswersController::class);
// Route::resource('dates', DatesController::class);
// Route::resource('events', EventsController::class);
Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);
Route::get('/questions', [QuestionsController::class,'index']);
Route::get('/questions/{id}', [QuestionsController::class,'show']);
Route::get('/answers', [AnswersController::class,'index']);
Route::get('/answers/{id}', [AnswersController::class,'show']);
Route::get('/dates', [DatesController::class,'index']);
Route::get('/dates/{id}', [DatesController::class,'show']);
Route::get('/dates/search/{title}', [DatesController::class,'search']);
Route::get('/events', [EventsController::class,'index']);
Route::get('/events/{id}', [EventsController::class,'show']);
Route::get('/events/search/{title}', [EventsController::class,'search']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/questions', [QuestionsController::class,'store']);
    Route::put('questions/{id}', [QuestionsController::class,'update']);
    Route::delete('questions/{id}', [QuestionsController::class,'destroy']);
    Route::post('/answers', [AnswersController::class,'store']);
    Route::put('answers/{id}', [AnswersController::class,'update']);
    Route::delete('answers/{id}', [AnswersController::class,'destroy']);
    Route::post('/dates', [DatesController::class,'store']);
    Route::put('dates/{id}', [DatesController::class,'update']);
    Route::delete('dates/{id}', [DatesController::class,'destroy']);
    Route::post('/events', [EventsController::class,'store']);
    Route::put('events/{id}', [EventsController::class,'update']);
    Route::delete('events/{id}', [EventsController::class,'destroy']);
    Route::post('/logout', [AuthController::class,'logout']);
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
