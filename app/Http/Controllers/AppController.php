<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function home()
    {
        return view('pages/home');
    }

    public function about()
    {
        return view('pages/about');
    }

    public function contact()
    {
        return view('pages/contact');
    }

    public function tshirt()
    {
        return view('pages/tshirt');
    }

    public function jacket()
    {
        return view('pages/jacket');
    }

    public function jersey()
    {
        return view('pages/jersey');
    }
}
