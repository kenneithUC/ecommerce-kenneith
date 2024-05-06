<?php

// use App\Http\Controllers\CobaController;

use App\Http\Controllers\CobaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Contollers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'Home']);
Route::get('/product/{id}-{name}', [HomeController::class, 'Product']);

Route::get('/test', [CobaController::class, 'Index']);

Route::get('/contact', [ContactController::class, 'View']);
Route::post('/contact', [ContactController::class, 'ActionContact']);
Route::get('/contact/list', [ContactController::class, 'ContactList']);
Route::get('/msg', [ContactController::class, 'ShowContactInfo'])->name('msg');
Route::post('/contact/delete/{index}', [ContactController::class, 'deleteContact'])->name('contact.delete');
Route::view('/cart', 'cart');
Route::view('/product', 'product');
Route::view('/login', 'login');
// Route::view('/contact', 'contact');