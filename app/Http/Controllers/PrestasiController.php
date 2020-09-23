<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestasi;
use App\Theme;
use App\Gallery;
use Illuminate\Support\Facades\Validator;

class PrestasiController extends Controller
{

    public function index()
    {
        return view('admin.prestasi',['tema' => Theme::find(1), 'title' => 'Prestasi']);
    }


    // RestController
    public function all()
    {
        $data = Prestasi::all();
        return $data;
    }

    public function show($id)
    {
        $hasil = Prestasi::find($id);
        return json_encode($hasil);
    }


    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(),[
            'kegiatan' => 'required',
    		'prestasi' => 'required'
    	]);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        Prestasi::create($request->all());
        return true;
    }

    public function update(Request $request, $id)
    {
    	$validator = Validator::make($request->all(),[
            'kegiatan' => 'required',
            'prestasi' => 'required'
        ]);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        Prestasi::where('id', $id)->update([
            'kegiatan' => $request->kegiatan,
            'prestasi' => $request->prestasi,
            'tahun' => $request->tahun,
        ]);
        return true;
    }

    public function destroy($id)
    {
        Prestasi::destroy($id);
        return true;
    }

    public function search($s){
        return Prestasi::where('prestasi','like','%'.$s.'%')->orWhere('kegiatan','like','%'.$s.'%')->orWhere('tahun','like','%'.$s.'%')->get();
    }


}
