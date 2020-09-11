<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'TechnicalDocumentController@index');
Route::get('list/{cid}', 'TechnicalDocumentController@list');
Route::get('documentAdd', 'TechnicalDocumentController@documentAdd');

Route::post('documentAddExe', 'TechnicalDocumentController@documentAddExe');
Route::post('documentAddKakunin/', 'TechnicalDocumentController@documentAddKakunin');