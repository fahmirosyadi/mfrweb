<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;

class KegiatanController extends Controller
{

    public function index()
    {
        return view('admin.kegiatan');
    }


    // RestController
    public function all($id)
    {
        $data = Kegiatan::all();
        $hasil = [];
        foreach ($data as $row) {
            if ($row->jenis == $id) {
                $hasil[] = $row;
            }
        }
        return $hasil;
    }

    public function show($id)
    {
        $hasil = Kegiatan::find($id);
        return $hasil;
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'kegiatan' => 'required',
            'foto' => 'image|max:2048'
    	]);
        if ($request->file('foto')) {
            $foto = $request->file('foto')->store('kegiatan');
        } else {
            $foto = null;
        }
        Kegiatan::create([
            'kegiatan' => $request->kegiatan,
            'keterangan' => $request->keterangan,
            'foto' => $foto,
            'jenis' => $request->jenis
        ]);
        return $request;
    }

    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::find($id);
        if ($request->file('foto')) {
            \Storage::delete($kegiatan->foto);
            $foto = $request->file('foto')->store('kegiatan');
        } else {
            $foto = $kegiatan->foto;
        }
    	$request->validate([
            'kegiatan' => 'required',
            'foto' => 'image|max:2048'
        ]);
        Kegiatan::where('id', $id)->update([
            'kegiatan' => $request->kegiatan,
            'keterangan' => $request->keterangan,
            'foto' => $foto,
            'jenis' => $request->jenis
        ]);
        return $request;
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::find($id);
        \Storage::delete($kegiatan->foto);
        Kegiatan::destroy($id);
        return true;
    }


}
