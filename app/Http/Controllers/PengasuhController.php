<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengasuh;

class PengasuhController extends Controller
{
    public function index()
    {
        return view('admin.pengasuh');
    }


    // RestController

    public function get()
    {
        $hasil = Pengasuh::find(1);
        return $hasil;
    }

    public function update(Request $request)
    {
        $pengasuh = Pengasuh::find(1);
        if ($request->file('foto')) {
            \Storage::delete($pengasuh->foto);
            $foto = $request->file('foto')->store('pengasuh');
        } else {
            $foto = $pengasuh->foto;
        }
        $request->validate([
            'nama' => 'required',
            'foto' => 'image|max:2048'
        ]);
        Pengasuh::where('id', 1)->update([
            'nama' => $request->nama,
            'sambutan' => $request->sambutan,
            'foto' => $foto
        ]);
        return $request;
    }
}
