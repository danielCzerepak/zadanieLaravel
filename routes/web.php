<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('forms', 'FormController@index')->name('forms.index');

Route::get('', 'FormController@createStepOne')->name('forms.create.step.one');
Route::post('forms/create-step-one', 'FormController@postCreateStepOne')->name('forms.create.step.one.post');

Route::get('forms/create-step-two', 'FormController@createStepTwo')->name('forms.create.step.two');
Route::post('forms/create-step-two', 'FormController@postCreateStepTwo')->name('forms.create.step.two.post');

Route::get('forms/create-step-three', 'FormController@createStepThree')->name('forms.create.step.three');