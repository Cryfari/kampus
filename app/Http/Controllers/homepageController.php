<?php

namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Http\Request;

class homepageController extends Controller
{
    public function home(){

        return view('home');
    }
    public function berita(){
        $datas = berita::all();

        return view('beritaguest')->with('datas', $datas);
    }
    public function tampilberita($id){
        $data = berita::findOrFail($id);

        return view('tampilberita')->with('data', $data);
    }
}
