<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    Public function index(){
        return view('index');
    }

    Public function home(){
        return view('home');
    }
    Public function IniciarSesion(){
        return view('IniciarSesion');
    }
    Public function reservar(){
        return view('reservar');
    }
    Public function contacto(){
        return view('contacto');
    }
    
}
