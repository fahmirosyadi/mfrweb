<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\Theme;
class BeritaController extends Controller
{
    public function index()
    {
        return view('admin.berita',['tema' => Theme::find(1), 'title' => 'Berita']);
    }


    // RestController
    public function all()
    {
        $data = Berita::all();
        return $data;
    }

    public function limitHTML($page)
    {
        $data = Berita::orderBy('created_at','desc')->limit(3)->offset(($page - 1) * 3)->get();
        return view('user2.berita-isi',['berita' => $data]);
    }

    public function create()
    {
        return view('admin.berita-create',['tema' => Theme::find(1), 'title' => 'Berita']);
    }

    public function edit($id)
    {
        $berita = Berita::find($id);
        return view('admin.berita-edit',['berita' => $berita, 'tema' => Theme::find(1), 'title' => 'Berita']);
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
            'foto' => $foto,
            'views' => 0
        ]);
        return redirect('/admin/berita');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        	'judul' => 'required',
            'berita' => 'required',
            'foto' => 'image|max:2048'
        ]);
    	$berita = Berita::find($id);
        if ($request->file('foto')) {
            \Storage::delete($berita->foto);
            $foto = $request->file('foto')->store('berita');
        } else {
            $foto = $berita->foto;
        }
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

    public function search($s){
        $data = Berita::where('judul','like','%'.$s.'%')->orWhere('berita','like','%'.$s.'%')->get();
        return $data;
    }

    public function searchHTML($s){
        $data = Berita::orderBy('created_at','desc')->where('judul','like','%'.$s.'%')->orWhere('berita','like','%'.$s.'%')->limit(3)->get();
        return view('user2.berita-isi',['berita' => $data]);
    }
}
