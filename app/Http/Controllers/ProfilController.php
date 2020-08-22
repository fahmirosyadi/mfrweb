<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profil;

class ProfilController extends Controller
{
    public function index()
    {
        return view('admin.profil');
    }


    // RestController

    public function get()
    {
        $hasil = Profil::find(1);
        return $hasil;
    }

    public function update(Request $request)
    {
        $profil = Profil::find(1);
        if ($request->file('foto')) {
            \Storage::delete($profil->foto);
            $foto = $request->file('foto')->store('profil');
        } else {
            $foto = $profil->foto;
        }
        $request->validate([
            'nama' => 'required'
        ]);
        Profil::where('id', 1)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tahun' => $request->tahun,
            'sejarah' => $request->sejarah,
            'foto' => $foto
        ]);
        return $request;
    }
}
