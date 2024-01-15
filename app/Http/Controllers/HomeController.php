<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $teste = "Primeiro código em PHP com Laravel";

        echo $teste;
    }
}
