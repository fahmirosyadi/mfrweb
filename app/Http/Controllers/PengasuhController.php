<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengasuh;
use App\Theme;
use Illuminate\Support\Facades\Validator;

class PengasuhController extends Controller
{
    public function index()
    {
        return view('admin.pengasuh',['tema' => Theme::find(1), 'title' => 'Pengasuh']);
    }


    // RestController

    public function get()
    {
        $hasil = Pengasuh::find(1);
        return $hasil;
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'foto' => 'image|max:2048'
        ]);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        $pengasuh = Pengasuh::find(1);
        if ($request->file('foto')) {
            \Storage::delete($pengasuh->foto);
            $foto = $request->file('foto')->store('pengasuh');
        } else {
            $foto = $pengasuh->foto;
        }
        Pengasuh::where('id', 1)->update([
            'nama' => $request->nama,
            'sambutan' => $request->sambutan,
            'foto' => $foto
        ]);
        return true;
    }
}
