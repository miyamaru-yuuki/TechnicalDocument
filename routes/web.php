<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'TechnicalDocumentController@index');
Route::get('list/{cid}', 'TechnicalDocumentController@list');
Route::get('documentAdd', 'TechnicalDocumentController@documentAdd');
Route::get('update/{did}', 'TechnicalDocumentController@update');

Route::post('documentAddExe', 'TechnicalDocumentController@documentAddExe');
Route::post('documentAddKakunin/', 'TechnicalDocumentController@documentAddKakunin');
Route::post('{did}/documentUpdExe', 'TechnicalDocumentController@documentUpdExe');