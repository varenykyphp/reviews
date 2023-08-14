<?php


use App\Http\Kernel;
use Illuminate\Support\Facades\Route;
use VarenykyReview\Http\Controllers\ReviewController;

Route::prefix(config('varenyky.path'))->name('admin.')->middleware(resolve(Kernel::class)->getMiddlewareGroups()['web'])->group(function () {
route::resource('/reviews',ReviewController::class);
});