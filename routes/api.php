<?php

// use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\MarriageContractController;
use Illuminate\Support\Facades\Route;

// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/user', [AuthController::class, 'user']);
//     Route::post('/logout', [AuthController::class, 'logout']);
//     Route::get('/profile', [MarriageContractController::class, 'getUserProfile']);
//     Route::post('/user-update', [MarriageContractController::class, 'userUpdate']);
//     Route::post('/change-password', [MarriageContractController::class, 'changePassword']);
    
// });

Route::post('/marriage-contracts', [MarriageContractController::class, 'create']);
// Route::get('/marriage-contracts', [MarriageContractController::class, 'index']);


Route::post('/contact-us',[ContactController::class,'contactUs']);