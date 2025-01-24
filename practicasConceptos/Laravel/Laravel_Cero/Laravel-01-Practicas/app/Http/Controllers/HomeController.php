<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    // se utiliza __invoke para indicar que es un solo metodo
    //
    public function __invoke()
    {
        // el View es un helper que permite renderizar una vista
        return View('home');
    }
}
