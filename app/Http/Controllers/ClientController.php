<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\Madrasah;

class ClientController extends Controller
{
    public function home(){
        return view('client.home');
    }

    public function map(){
        return view('client.map');
    }

    public function current_map($lat, $long){
        return view('client.current_map',["lat"=>$lat,"long"=>$long]);
    }

    public function category(){
        $madrasah = Madrasah::all();

        return view('client.category',["madrasah"=>$madrasah]);
    }

    public function aboutus(){
        return view('client.aboutus');
    }

    public function contactus(){
        return view('client.contactus');
    }

    public function api_madrasah(){
        $madrasah = Madrasah::all();
        return response()->json($madrasah);
    }
}
