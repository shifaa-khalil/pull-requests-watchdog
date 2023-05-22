<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PRController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleSheetsController;

Route::get('/pull-requests', [PRController::class, 'pullRequests']);
Route::get('/review-required-pr', [PRController::class, 'reviewRequiredPR']);
Route::get('/status-success-pr', [PRController::class, 'statusSuccessPR']);
Route::get('/no-review-pr', [PRController::class, 'noReviewPR']);
Route::get('/getDataFromGoogleSheet', [GoogleSheetsController::class, 'getDataFromGoogleSheet']);
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle']);
Route::get('/authorize-google-sheets', [GoogleSheetsController::class, 'authorize'])->name('authorize-google-sheets');
Route::get('/google-sheets/callback', [GoogleSheetsController::class, 'handleCallback'])->name('google-sheets.callback');

Route::get('/add-data', [GoogleSheetsController::class, 'addData']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
