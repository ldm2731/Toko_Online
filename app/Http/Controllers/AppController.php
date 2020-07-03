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

    public function tshirt()
    {
        return view('front/pages/tshirt');
    }

    public function jacket()
    {
        return view('front/pages/jacket');
    }

    public function jersey()
    {
        return view('front/pages/jersey');
    }
}
