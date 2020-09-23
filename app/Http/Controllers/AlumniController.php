<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumni;
use App\Theme;
use Illuminate\Support\Facades\Validator;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.alumni',['tema' => Theme::find(1), 'title' => 'Alumni']);
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

    public function create()
    {
        $alumni = new Alumni;
        return view('admin.alumni-form',['alumni' => $alumni,'tema' => Theme::find(1), 'title' => 'Alumni','action' =>'/admin/alumni']);
    }

    public function edit($id)
    {
        $alumni = Alumni::find($id);
        return view('admin.alumni-form',['alumni' => $alumni, 'tema' => Theme::find(1), 'title' => 'Alumni','action' => '/admin/alumni/update/'.$id]);
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
            'job' => $request->job,
            'alamat' => $request->alamat,
            'foto' => $foto,
            'testimoni' => $request->testimoni,
            'tahun' => $request->tahun
        ]);
        return redirect('/admin/alumni');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'tahun' => 'required',
            'foto' => 'image|max:2048'
        ]);
        $alumni = Alumni::find($id);
        if ($request->file('foto')) {
            \Storage::delete($alumni->foto);
            $foto = $request->file('foto')->store('alumni');
        } else {
            $foto = $alumni->foto;
        }
        Alumni::where('id', $id)->update([
            'nama' => $request->nama,
            'job' => $request->job,
            'alamat' => $request->alamat,
            'tahun' => $request->tahun,
            'testimoni' => $request->testimoni,
            'foto' => $foto
        ]);
        return redirect('/admin/alumni');
    }

    public function destroy($id)
    {
        $alumni = Alumni::find($id);
        \Storage::delete($alumni->foto);
        Alumni::destroy($id);
        return true;
    }

    public function search($s){
        return Alumni::where('nama','like','%'.$s.'%')->orWhere('alamat','like','%'.$s.'%')->orWhere('tahun','like','%'.$s.'%')->orWhere('alamat','like','%'.$s.'%')->get();
    }


}
