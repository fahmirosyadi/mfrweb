<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use Illuminate\Support\Facades\Validator;

class TemaController extends Controller
{

    public function index()
    {
        return view('admin.tema',['tema' => Theme::find(1), 'title' => 'Tema']);
    }


    // RestController

    public function get()
    {
        $hasil = Theme::find(1);
        return $hasil;
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'bg1' => ['image','max:2048'],
            'logo' => ['image','max:2048'],
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        $tema = Theme::find(1);
        if ($request->file('bg1')) {
            \Storage::delete($tema->bg1);
            $foto1 = $request->file('bg1')->store('tampilan');
        } else {
            $foto1 = $tema->bg1;
        }
        if ($request->file('bg2')) {
            \Storage::delete($tema->bg2);
            $foto2 = $request->file('bg2')->store('tampilan');
        } else {
            $foto2 = $tema->bg2;
        }
        if ($request->file('logo')) {
            \Storage::delete($tema->logo);
            $logo = $request->file('logo')->store('tampilan');
        } else {
            $logo = $tema->logo;
        }
    

        Theme::where('id', 1)->update([
            'judul' => $request->judul,
            'judul2' => $request->judul2,
            'bg1' => $foto1,
            'bg2' => $foto2,
            'logo' => $logo
        ]); 
        return true;
    }

}
