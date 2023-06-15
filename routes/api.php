<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/users', function () {
    $user = User::find(1);
    $user->addMedia(storage_path('demo/oknasa.jpg'))
        ->preservingOriginal()
        ->toMediaCollection('images','tebi');

//    return $user->getFirstMediaUrl('images');

});
