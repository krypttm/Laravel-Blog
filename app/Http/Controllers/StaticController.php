<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller {

    public function index() {
        $title = "Главная страница сайта";
        return view('static.index', compact('title'));
    }


    public function about() {
        $data = array(
            'title' => 'Страница про нас',
            'params' => ['BMW', 'Audi', 'Volvo']
        );

        return view('static.about')->with($data);
    }

}
