<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'TechnicalDocumentController@index');
Route::post('/', 'TechnicalDocumentController@index');
Route::get('list/{cid}', 'TechnicalDocumentController@list');
Route::get('documentAdd', 'TechnicalDocumentController@documentAdd');
Route::get('update/{did}', 'TechnicalDocumentController@update');
Route::get('documentDelKakunin/{did}', 'TechnicalDocumentController@documentDelKakunin');

Route::get('categorySet', 'TechnicalDocumentController@categorySet');
Route::get('categoryUpdate/{cid}', 'TechnicalDocumentController@categoryUpdate');
Route::get('categoryDelExe/{cid}', 'TechnicalDocumentController@categoryDelExe');

Route::post('documentAddExe', 'TechnicalDocumentController@documentAddExe');
Route::post('documentAddKakunin', 'TechnicalDocumentController@documentAddKakunin');
Route::post('documentUpdExe', 'TechnicalDocumentController@documentUpdExe');
Route::post('documentDelExe', 'TechnicalDocumentController@documentDelExe');

Route::post('categoryAddExe', 'TechnicalDocumentController@categoryAddExe');
Route::post('categoryUpdExe', 'TechnicalDocumentController@categoryUpdExe');