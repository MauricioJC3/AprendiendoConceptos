<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Hola mundo!';
});

Route::get('/post/{post}', function ($post) {
    return 'post ' . $post;
});

