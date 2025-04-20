<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogPost\BlogPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/** Auth  */
Route::post("authenticate", [AuthController::class, "authenticate"])->name("authenticate");
Route::post("register", [AuthController::class, "register"])->name("register");
Route::middleware("auth:sanctum")->post("logout", [AuthController::class, "logout"])->name("logout");

/** Blog Post  */

Route::prefix("blog-post")->group(function() {
    Route::get("details/{blog}", [BlogPostController::class, "details"])->name("blog-post.details");
    Route::get("all", [BlogPostController::class, "all"])->name("blog-post.all");
    Route::post("save", [BlogPostController::class, "save"])->name("blog-post.save")->middleware("auth:sanctum");
});