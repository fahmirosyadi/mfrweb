<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;

class TemaController extends Controller
{

    public function index()
    {
        return view('admin.tema');
    }


    // RestController

    public function get()
    {
        $hasil = Theme::find(1);
        return $hasil;
    }

    public function update(Request $request)
    {
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
        $request->validate([
            'judul' => 'required',
            'tema' => 'required'
        ]);
        Theme::where('id', 1)->update([
            'judul' => $request->judul,
            'bg1' => $foto1,
            'bg2' => $foto2,
            'tema' => $request->tema
        ]);
        return $tema;
    }

}
