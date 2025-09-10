<?php

use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return 'desde admin.php';  
})->name('home');
