<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Laravel8から、App\Http\Controllers\が先頭に必要なので注意!
|
*/

// 既存
Route::get('/q/{id_36}', 'App\Http\Controllers\CueController@show')->name('cue.show');
// 更新
Route::get('/y/{yt_slug}/{id_36}', 'App\Http\Controllers\CueController@update')->name('cue.update')->where('yt_slug', '^.{11}$');
// 新規
Route::get('/y/{yt_slug}', 'App\Http\Controllers\CueController@create')->name('cue.create')->where('yt_slug', '^.{11}$');
Route::get('/y/{yt_slug}', 'App\Http\Controllers\CueController@create')->name('cue.create')->where('yt_slug', '^.{11}$');
Route::get('/y/{yt_url?}', function (Request $request, $yt_url) {
    $match = null;
    preg_match('#[\/=][^\/]{11}(&|$)#', $yt_url, $match);
    if (isset($match[0])){
        $yt_slug = substr($match[0], 1, 11);
        return redirect("/y/$yt_slug", 301); // n = new, 
    }else{
        $v = request('v');
        if (isset($v)){
            $yt_slug = $v;
            return redirect("/y/$yt_slug", 301); // n = new, 
        }else{
            return redirect("/", 301); // n = new, 
        }
    }
})->where('yt_url', '(.*)');
// 保存
Route::post('/s', 'App\Http\Controllers\CueController@store')->name('cue.store');

// Top
Route::get('/', 'App\Http\Controllers\CueController@index')->name('cue.index');


// tos
Route::view('/tos', 'tos');



Route::get('/watch', function (Request $request) {
    $v = request('v');
    if (isset($v)){
        $yt_slug = $v;
        return redirect("/y/$yt_slug", 301); // n = new, 
    }else{
        return redirect("/", 301); // n = new, 
    }
});

