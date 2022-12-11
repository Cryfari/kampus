<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\berita;
use Illuminate\Support\Facades\Storage;

class beritaController extends Controller
{
    public function berita(){
        $datas = berita::all();

        return view('dashboard')->with('datas', $datas);
    }

    public function detail_berita($id){
        $data = berita::findOrFail($id);

        return view('detailberita')->with('data', $data);
    }

    public function tambah_berita(){

        return view('formberita');
    }

    public function tambah_berita_proccess(Request $request){
        if($request->image == ''){
            $image = 'default.jpeg';

        }else{
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('storage').'/images', $image);

        }
        berita::create([
            'judul' => $request->judul,
            'image' => $image,
            'headline' => $request->headline,
            'isi' => $request->isi,
            'pengirim' => $request->pengirim
        ]);

        return redirect('dashboard');
    }


    public function edit_berita($id){
        $data = berita::findOrFail($id);

        return view('formberita')->with('data', $data);
    }

    public function edit_berita_proccess(Request $request, $id, $image){
        $data = berita::findOrFail($id);
        if($request->image !== $data->image){
            if(Storage::delete($data->image)) {
                $image_dir = public_path('storage').'/images/'.$image;
                unlink($image_dir);
             }
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('storage').'/images', $image);
        }
        $data->update([
            'judul' => $request->judul,
            'image' => $image,
            'headline' => $request->headline,
            'isi' => $request->isi,
            'pengirim' => $request->pengirim
        ]);
        return redirect('dashboard');
    }


    public function hapus_berita($id){
        $data = berita::find($id);
        $data->delete();

        return redirect('dashboard');
    }

}
