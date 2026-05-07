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
Route::get('/contacts/search/name', [ContactsController::class, 'searchByNameview'])->name('contacts.search.name.view');
Route::post('/contacts/search/name', [ContactsController::class, 'searchByName'])->name('contacts.search.name');
Route::get('/contacts/search/phone', [ContactsController::class, 'searchByPhoneview'])->name('contacts.search.phone.view');
Route::post('/contacts/search/phone', [ContactsController::class, 'searchByPhone'])->name('contacts.search.phone');
Route::get('/contacts/delete/name', [ContactsController::class, 'destroyByNameview'])->name('contacts.delete.name.view');
Route::delete('/contacts/delete/name', [ContactsController::class, 'destroyByName'])->name('contacts.delete.name');
Route::get('/contacts/delete/phone', [ContactsController::class, 'destroyByPhoneview'])->name('contacts.delete.phone.view');
Route::delete('/contacts/delete/phone', [ContactsController::class, 'destroyByPhone'])->name('contacts.delete.phone');
Route::get('/exit', [ContactsController::class, 'exit'])->name('contacts.exit');
