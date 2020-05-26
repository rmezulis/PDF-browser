<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ShowAllPdfController')->name('pdf.show_all');
Route::post('/', 'StorePdfController')->name('pdf.store');
