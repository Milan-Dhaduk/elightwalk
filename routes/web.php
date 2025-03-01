<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/records/create', [RecordController::class, 'createRecord'])->name('records.create');
Route::post('/records', [RecordController::class, 'recordStore'])->name('records.store');
Route::get('/records/{id}', [RecordController::class, 'recordShow'])->name('records.show');
Route::post('/records/{id}/verify', [RecordController::class, 'recordVerify'])->name('records.verify');
