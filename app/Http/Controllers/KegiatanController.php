<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\Theme;
use Illuminate\Support\Facades\Validator;

class KegiatanController extends Controller
{

    public function index()
    {
        return view('admin.kegiatan',['tema' => Theme::find(1), 'title' => 'Program']);
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
    	$validator = Validator::make($request->all(),[
    		'kegiatan' => 'required',
            'foto' => 'image|max:2048'
    	]);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }
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
        return true;
    }

    public function update(Request $request, $id)
    {
    	$validator = Validator::make($request->all(),[
            'kegiatan' => 'required',
            'foto' => 'image|max:2048'
        ]);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        $kegiatan = Kegiatan::find($id);
        if ($request->file('foto')) {
            \Storage::delete($kegiatan->foto);
            $foto = $request->file('foto')->store('kegiatan');
        } else {
            $foto = $kegiatan->foto;
        }
        Kegiatan::where('id', $id)->update([
            'kegiatan' => $request->kegiatan,
            'keterangan' => $request->keterangan,
            'foto' => $foto,
            'jenis' => $request->jenis
        ]);
        return true;
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::find($id);
        \Storage::delete($kegiatan->foto);
        Kegiatan::destroy($id);
        return true;
    }

    public function search($jenis, $s){
        return Kegiatan::where('id','like','%'.$s.'%')->where('jenis',$jenis)->orWhere('kegiatan','like','%'.$s.'%')->where('jenis',$jenis)->get();
    }

}
