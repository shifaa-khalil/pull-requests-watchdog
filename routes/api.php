<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PRController;

Route::get('/pull-requests', [PRController::class, 'pullRequests']);
Route::get('/review-required-pr', [PRController::class, 'reviewRequiredPR']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
