<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    public function index()
    {
        return View('posts.index');
    }

    public function create()
    {
        return View('posts.create');
    }

    public function show($post)
    {
        return View('posts.show', compact('post'));
    }
}
