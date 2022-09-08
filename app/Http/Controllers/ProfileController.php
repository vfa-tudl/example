<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
     public function index()
    {
        $user = auth()->User();
        $orders=\App\Models\Post::all();
        return view('home',[
            'orders'=> $orders,
            'user'=>$user
        ]);
    }
}
