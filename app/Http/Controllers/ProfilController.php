<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profil;
use App\Theme;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    public function index()
    {
        return view('admin.profil',['tema' => Theme::find(1), 'title' => 'Profil']);
    }


    // RestController

    public function get()
    {
        $hasil = Profil::find(1);
        return $hasil;
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'tahun' => 'required|numeric',
            'foto' => 'image|max:2048'
        ]);
        if ($validator->fails()) {
        	return $validator->errors()->all();
        }
        $profil = Profil::find(1);
        if ($profil) {
	        if ($request->file('foto')) {
	            \Storage::delete($profil->foto);
	            $foto = $request->file('foto')->store('profil');
	        } else {
	            $foto = $profil->foto;
	        }
	        Profil::where('id', 1)->update([
	            'nama' => $request->nama,
	            'alamat' => $request->alamat,
	            'tahun' => $request->tahun,
	            'sejarah' => $request->sejarah,
	            'foto' => $foto
	        ]);
        } else {
	        if ($request->file('foto')) {
	            $foto = $request->file('foto')->store('profil');
	        } else {
	            $foto = null;
	        }
	        Profil::create([
	            'nama' => $request->nama,
	            'alamat' => $request->alamat,
	            'tahun' => $request->tahun,
	            'sejarah' => $request->sejarah,
	            'foto' => $foto
	        ]);
        }
        return true;
    }
}

