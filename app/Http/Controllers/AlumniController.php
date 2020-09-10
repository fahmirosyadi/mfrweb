<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumni;
class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.alumni');
    }


    // RestController
    public function all()
    {
        $hasil = Alumni::all();
        return $hasil;    
    }

    public function show($id)
    {
        $hasil = Alumni::find($id);
        return $hasil;
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tahun' => 'required',
            'foto' => 'image|max:2048'
        ]);
        if ($request->file('foto')) {
            $foto = $request->file('foto')->store('alumni');
        } else {
            $foto = null;
        }
        Alumni::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'foto' => $foto,
            'testimoni' => $request->testimoni,
            'tahun' => $request->tahun
        ]);
        return true;
    }

    public function update(Request $request, $id)
    {
        $alumni = Alumni::find($id);
        if ($request->file('foto')) {
            \Storage::delete($alumni->foto);
            $foto = $request->file('foto')->store('alumni');
        } else {
            $foto = $alumni->foto;
        }
        $request->validate([
            'nama' => 'required',
            'tahun' => 'required',
            'foto' => 'image|max:2048'
        ]);
        Alumni::where('id', $id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tahun' => $request->tahun,
            'testimoni' => $request->testimoni,
            'foto' => $foto
        ]);
        return true;
    }

    public function destroy($id)
    {
        $alumni = Alumni::find($id);
        \Storage::delete($alumni->foto);
        Alumni::destroy($id);
        return true;
    }


}
