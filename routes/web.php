<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    $success = Session::get('success');
    $error = Session::get('error');
    return view('home' , compact('success','error'));
})->name('home');

// Contact Routes
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [ContactsController::class, 'create'])->name('contacts.create');
Route::post('/contacts', [ContactsController::class, 'store'])->name('contacts.store');
Route::delete('/contacts/delete/{contact}', [ContactsController::class, 'destroy'])->name('contacts.destroy');
Route::get('/contacts/{contact}', [ContactsController::class, 'show'])->name('contacts.show');
Route::get('/exit', [ContactsController::class, 'exit'])->name('contacts.exit');
