<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengurus;

class PengurusController extends Controller
{
    public function index()
    {
        return view('admin.pengurus');
    }


    // RestController

    public function get()
    {
        $hasil = Pengurus::find(1);
        return $hasil;
    }

    public function update(Request $request)
    {
        $pengurus = Pengurus::find(1);
        if ($request->file('foto')) {
            \Storage::delete($pengurus->foto);
            $foto = $request->file('foto')->store('pengurus');
        } else {
            $foto = $pengurus->foto;
        }
        $request->validate([
            'nama' => 'required'
        ]);
        Pengurus::where('id', 1)->update([
            'nama' => $request->nama,
            'sambutan' => $request->sambutan,
            'foto' => $foto
        ]);
        return $request;
    }
}
