<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function home()
    {
        return view('front/pages/home');
    }

    public function about()
    {
        return view('front/pages/about');
    }

    public function contact()
    {
        return view('front/pages/contact');
    }

}
