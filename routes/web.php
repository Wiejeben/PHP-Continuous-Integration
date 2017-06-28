<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('blank', ['ip' => $_SERVER['REMOTE_ADDR']]);
});

Route::post('/test', function (\Illuminate\Http\Request $request) {

    $record = new \App\Record();

    $record->mac = $request->input('mac_address');
    $record->ip_lan = $request->input('lan_ip');
    $record->ip_wan = $request->ip();
    
    $record->lat = ($request->input('gps_latitude') == 'nan') ? 0.0 : $request->input('gps_latitude');
    $record->long = ($request->input('gps_longitude') == 'nan') ? 0.0 : $request->input('gps_longitude');

    $record->save();

    return response()->json($request->all());
});