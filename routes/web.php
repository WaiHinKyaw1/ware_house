<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/products', [ItemController::class, 'index']);
Route::get('/items', function () {
    return view('items.index');
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products/create', function () {
    return view('productsnew');
});

Route::get('/transporation', function () {
    return view('transporation');
});
Route::get('/transporation_history', function () {
    return view('transporationHistory');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/admintransporationhistory', function () {
    return view('admintransporationhistory');
});
Route::get('/admindriverlist', function () {
    return view('AdminDriverList');
});
Route::get('/warehouselist', function () {
    return view('warehouse');
});
Route::get('/createwarehouse', function () {
    return view('createWarehouse');
});
Route::get('/adminngolist', function () {
    return view('AdminNgoList');
});
Route::get('/createngo', function () {
    return view('createNgo');
});
Route::get('/adminwarehouse', function () {
    return view('adminwarehouse');
});
Route::get('/trucklist', function () {
    return view('trucklist');
});
Route::get('/truckcreate', function () {
    return view('truckcreate');
});
Route::get('/driverlist', function () {
    return view('driverlist');
});
Route::get('/createDriver', function () {
    return view('createDriver');
});
Route::get('/adminrequest', function () {
    return view('adminrequest');
});
Route::get('/admin', function () {
    return view('admin.admin');
});
