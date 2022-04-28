<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller {

    public function index() {
        $title = "Главная страница сайта";
        return view('static.index', compact('title'));
    }


    public function about() {
   
        return view('static.about');
    }

}
