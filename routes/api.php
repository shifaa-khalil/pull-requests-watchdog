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

Route::get('/add-data', [GoogleSheetsController::class, 'addData']);
Route::get('/add-reviewRequiredPR', [GoogleSheetsController::class, 'addReviewRequiredPR']);
Route::get('/add-statusSuccessPR', [GoogleSheetsController::class, 'addStatusSuccessPR']);
Route::get('/add-noReviewPR', [GoogleSheetsController::class, 'addNoReviewPR']);
