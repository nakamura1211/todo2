<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;

Route::apiResource('/content', ContentController::class);
