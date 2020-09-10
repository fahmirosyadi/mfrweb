<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        return view('admin.berita');
    }


    // RestController
    public function all()
    {
        $data = Berita::all();
        return $data;
    }

    public function create()
    {
        return view('admin.berita-create');
    }

    public function edit($id)
    {
        $berita = Berita::find($id);
        return view('admin.berita-edit',['berita' => $berita]);
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'judul' => 'required',
            'berita' => 'required',
            'foto' => 'image|max:2048'
        ]);
        if ($request->file('foto')) {
            $foto = $request->file('foto')->store('berita');
        } else {
            $foto = null;
        }
        Berita::create([
        	'judul' => $request->judul,
            'berita' => $request->berita,
            'foto' => $foto
        ]);
        return redirect('/admin/berita');
    }

    public function update(Request $request, $id)
    {
    	$berita = Berita::find($id);
        if ($request->file('foto')) {
            \Storage::delete($berita->foto);
            $foto = $request->file('foto')->store('berita');
        } else {
            $foto = $berita->foto;
        }
        $request->validate([
        	'judul' => 'required',
            'berita' => 'required',
            'foto' => 'image|max:2048'
        ]);
        Berita::where('id', $id)->update([
        	'judul' => $request->judul,
            'berita' => $request->berita,
            'foto' => $foto
        ]);
        return redirect('/admin/berita');
    }

    public function destroy($id)
    {
        $berita = Berita::find($id);
        \Storage::delete($berita->foto);
        Berita::destroy($id);
        return true;
    }
}
