<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //находим все статьи которые пренадлежат тому пользователю который сейчас авторизирован
        //указала привязки в articles и user моделях
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('user')->with('articles', $user->articles);
    }
}
