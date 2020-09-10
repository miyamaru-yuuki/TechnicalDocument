<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'TechnicalDocumentController@index');
Route::get('list/{cid}', 'TechnicalDocumentController@list');
Route::get('documentAdd', 'TechnicalDocumentController@documentAdd');

Route::post('/', 'TechnicalDocumentController@index');
Route::post('documentAddKakunin/', 'TechnicalDocumentController@documentAddKakunin');