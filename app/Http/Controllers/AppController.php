<?php

namespace App\Http\Controllers;

use App\Data_baju;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

    public function detailProduct($id)
    {
        $data['baju'] = Data_baju::find($id);

        return view('front.pages.detail', $data);
    }

    public function orderProduct(Request $request)
    {
        if (!@Auth::user()->id) {
            return redirect()->route('user.login');
        }

        $request->validateWithBag('message', [
            'alamat' => 'required',
            'no_tlpn' => 'required',
        ]);

        User::where('id', Auth::user()->id)->update([
            'alamat' => $request->alamat,
            'no_tlpn' => $request->no_tlpn,
        ]);

        $link = route('front.detail', $request->id);

        return Redirect::to('https://api.whatsapp.com/send?phone=6282328828130&text=*alamat*:%20' . $request->alamat . '%20saya%20mau%20pesan%20baju%20ini: ' . $link);
    }
}