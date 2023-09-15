<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TaskController;
use App\Http\Controllers\API\TaskCommentController;
use App\Http\Controllers\API\TaskStatusController;
use App\Http\Controllers\API\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class,'login']);
    Route::post('signup', [AuthController::class,'signup']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);

});

Route::group([

    'middleware' => 'api',
    'prefix' => 'task'

], function ($router) {

    Route::get('/', [TaskController::class,'index']);
    Route::post('/', [TaskController::class,'store']);

    Route::group([

        'middleware' => 'user_role:employee',
        'prefix' => 'comment'

    ], function ($router) {
        Route::post('/', [TaskCommentController::class,'store']);
    });

    Route::group([

        'middleware' => 'user_role:employee',
        'prefix' => 'status'

    ], function ($router) {
        Route::patch('/', [TaskStatusController::class,'edit']);
    });

});

Route::group([

    'middleware' => 'api',
    'prefix' => 'user'

], function ($router) {
    Route::get('/employee', [UserController::class,'getEmployees'])->middleware('user_role:manager');
});
