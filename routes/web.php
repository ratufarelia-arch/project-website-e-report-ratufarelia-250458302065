<?php

use App\Http\Controllers\admin\datausercontroller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// route biasanya
Route::get('/kenalan', function(){
    return('halooo namaku Aisy');
});

// route parameter

Route::get('/halo/{nama}', function($nama){
    return 'selamat datang' . $nama;
});

// route name

Route::get('/buah', function(){
    return 'stroberi, mangga, apel';
})->name('fruit');

// route view
// jika file html nya didalam folder maka panggil dulu nama foldernya
// contoh : namafolder.namafile
// tetapi jika file html nya langsung menyentuh folder view maka langsung saja panggil nama filenya

Route::get('/landing-page', function(){
    return view('landingpage');
});

//route untuk admin
Route::prefix('admin')->middleware(['auth','admin'])->group(function(){
    Route::get('/dashboardadmin', function (){
        return view('admin.dashboardadmin');
    });
    Route::controller(datausercontroller::class)->group(function(){
        //route ini untuk menampilkan table data admin
        Route::get('/data-user','index')->name('index.data-user');
        // ini route untuk menampilkan form data user
        Route::get('/form-data-user','formdatauser')->name('form.data-user');
        //ini route untuk proses create/tambah data user
        Route::post('/create-data-user','createdatauser')->name('create.datauser');
        // ini route untuk menampilkan form edit data
        route::get('edit-data-user/{id}', 'editdatauser')->name('edit.datauser');
        //ini route untuk proses ambil data
        route::put('update-data-user/{id}','updatedatauser')->name('update.datauser');
        route::delete('delete-data-user/{id}','deletedatauser')->name('delete.datauser');


    });

});


//route untuk user
Route::prefix('user')->middleware(['auth','user'])->group(function(){
    Route::get('/dashboarduser', function (){
        return view('user.dashboarduser');
    });
    
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');