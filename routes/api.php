<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PRController;

Route::get('/pull-requests', [PRController::class, 'pullRequests']);
Route::get('/review-required-pr', [PRController::class, 'reviewRequiredPR']);
Route::get('/status-success-pr', [PRController::class, 'statusSuccessPR']);
Route::get('/no-review-pr', [PRController::class, 'noReviewPR']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
