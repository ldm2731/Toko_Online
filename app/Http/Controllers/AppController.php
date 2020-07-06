<?php

namespace App\Http\Controllers;

use App\Data_baju;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function home()
    {
        $data['produk'] = Data_baju::get();
        return view('front/pages/home', $data);
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
