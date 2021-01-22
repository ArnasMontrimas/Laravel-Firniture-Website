<?php

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

//The index page of the app it will be a login page
Route::get('/', 'PagesController@index')->name('login')->middleware('guest');

//Post request to sign in a user
Route::post('/', 'LoginController@login');

// Protected Routes - allow only logged in users
Route::middleware('auth')->group(function() {
    
    //Home page route
    Route::get('/home', 'PagesController@home')->name('home');


    //Routes only allowed for admin employees
    Route::middleware('admin')->group(function() {

        //Routes to storing, updating, deleting products
        Route::resource('product', 'ProductController')->except(['show']);

        //Routes to storing, updating, deleting employees
        Route::resource('employee', 'EmployeeController')->except(['show']);

    });

    Route::middleware('adminOrSupervisor')->group(function() {

        //Route to displaying form for creating timesheet (The product and user is already selected and passed to the controller function)
        Route::post('timesheet/create', 'TimesheetController@create');

        //Route to display current working timesheets
        Route::get('timesheets', 'TimesheetController@index');

        //Route to a form for continuing an incomplete timesheet;
        Route::post('timesheet/{timesheet}/edit', 'TimesheetController@edit');

        //Route to store a continuation of an incomplete timesheet
        Route::post('timesheet/{timesheet}/update', 'TimesheetController@update');

        //Route to store newly created timesheet
        Route::post('timesheet/store/{product}/{employee}/{weekEnding}', 'TimesheetController@store');

        //Route for selecting employee & product for timesheet
        Route::get('selection', 'PagesController@selectEmployeeProductForTimesheet');

        //Route for page which will allow  admin or supervisor to export company reports to excel spreadsheet
        Route::get('export', 'PagesController@exportToExcel');

        //Route to script where data will be excported to excel
        Route::post("/export/exportExcecution", "PagesController@exportToExcelExcecution");

    });

    //Logout route
    Route::get('/logout', 'LoginController@logout');

});

