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

Route::post('documentAddExe', 'TechnicalDocumentController@documentAddExe');
Route::post('documentAddKakunin', 'TechnicalDocumentController@documentAddKakunin');
Route::post('documentUpdExe', 'TechnicalDocumentController@documentUpdExe');
Route::post('documentDelExe', 'TechnicalDocumentController@documentDelExe');

Route::post('categoryAddExe', 'TechnicalDocumentController@categoryAddExe');
Route::post('categoryUpdExe', 'TechnicalDocumentController@categoryUpdExe');
Route::post('categoryDelExe', 'TechnicalDocumentController@categoryDelExe');

Route::post('categoryDelExe', 'TechnicalDocumentController@categoryDelExe');

//PDF出力
Route::get('pdf','PDFController@tcpdf');
//Route::get('pdf', function () {
//    $pdf = Faker\Factory::create('ja_JP');
//    $pdf = 'test';
//    return PDF::loadView('pdf', compact('pdf'))->inline();
//});