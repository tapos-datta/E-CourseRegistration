<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    $check=session()->get('success');
    echo $check;
    if($check!=null) {
        if ($check >= 0) return redirect()->route('check', ['id' => $check]);
    }
    else {
        return view('user.show');
    }

});



Route::get('/index', function () {
    return \view('user.show');

})->name('home');


Route:: post('/login','LogInController@login');



Route:: post('/createPdf/{id}',['as'=>'createpdf','uses'=>'PdfCreateController@makePdf']);

//Route::get('/download', ['uses' => 'PdfCreateController@makePdf', 'as' => 'download']);




Route::get('/registration',function(){

    return \view('user.registration');

})->name('registration');


Route::get('/loginForm',function(){

    return \view('user.loginForm');

})->name('loginform');


Route::get('/printform',function(){

    return \view('user.printregister');

})->name('print');



Route::get('/profile/{id}',function($id){

    return redirect()->route('check', ['id' => $id]);

})->name('profile');

Route::get('/settings',function(){

    if(session()->get('success')!=null){
        return view('admin.setting');
    }
    else
        return view('admin.error');

})->name('user_settings');



Route::get('/user',function(){
    $check=session()->get('success');
    return redirect()->route('check', ['id' => $check]);

})->name('user_home');

/*Route::get('/logout',function(){

     session()->flush();
     return \view('user.loginForm');

})->name('user_logout');*/

Route::get('/logout', 'Auth\LoginController@logout')->name('user_logout');


Route::get('/user/{id}', ['uses' =>'SessionCheckController@invoke', 'as'=>'check']);

Route::get('/profile', ['uses' =>'profileController@showInfo', 'as'=>'user_profile']);






Route::get('htmltopdfview',array('as'=>'htmltopdfview','uses'=>'ProductController@htmltopdfview'));




