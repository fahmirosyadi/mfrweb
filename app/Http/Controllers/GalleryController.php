<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Theme;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{

    public function index($id)
    {
        $listFoto = Gallery::where('prestasi_id',$id)->get();
        return view('admin.prestasi-gallery',['tema' => Theme::find(1),'title' => 'Gallery Prestasi','listFoto' => $listFoto,'prestasiId' => $id]);
    }


    // RestController
    public function all($id)
    {
        $listFoto = Gallery::where('prestasi_id',$id)->get();
        return $listFoto;
    }

    public function show($id)
    {
        return Gallery::find($id);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'foto' => 'required|image|max:2048'
        ]);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }

        if ($request->file('foto')) {
            $foto = $request->file('foto')->store('gallery-prestasi');
        } else {
            $foto = null;
        }
        Gallery::create([
            'keterangan' => $request->keterangan,
            'foto' => $foto,
            'prestasi_id' => $request->prestasiId
        ]);
        return true;
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'foto' => 'image|max:2048'
        ]);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }

    	$gallery = Gallery::find($id);
        if ($request->file('foto')) {
            \Storage::delete($gallery->foto);
            $foto = $request->file('foto')->store('gallery-prestasi');
        } else {
            $foto = $gallery->foto;
        }
        Gallery::where('id', $id)->update([
            'keterangan' => $request->keterangan,
            'foto' => $foto,
            'prestasi_id' => $request->prestasiId
        ]);
        return true;
    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        \Storage::delete($gallery->foto);
        Gallery::destroy($id);
        return true;
    }

    public function search($id, $s){
        return Gallery::where('keterangan','like','%'.$s.'%')->where('prestasi_id',$id)->get();
    }

}
