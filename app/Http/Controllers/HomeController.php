<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        return view('home.home');
    }
    
    function adminIndex(){
        return view('home.admin');
    }
    
    function notdone(){
        return view('home.notdone');
    }
}
