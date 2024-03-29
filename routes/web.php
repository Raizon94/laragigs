<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ListingController::class, 'index']);

//Show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//Store route
Route::post('/listings', [ListingController::class, 'store']);

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');
Route::put('/listings/{listing}', [ListingController::class,'update'])->middleware('auth');

Route::delete('/listings/{listing}', [ListingController::class,'destroy'])->middleware('auth');

//Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);


//USER AUTH
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);


Route::post('/logout', [UserController::class,'logout'])->middleware('auth');

Route::get('/login', [UserController::class,'login'])->name('login')->middleware('guest');

Route::post('/users/authenticate', [UserController::class,'authenticate']);


//Common resource routes:
/*  index: show all listings
    show: show single listing
    create: show form to create new listing
    store: store new listing
    edit: show form to edit listing
    update: update listing
    destroy: delete listing
*/