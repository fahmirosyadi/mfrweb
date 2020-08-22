<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestasi;

class PrestasiController extends Controller
{

    public function index()
    {
        return view('admin.prestasi');
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
    	$request->validate([
            'kegiatan' => 'required',
    		'prestasi' => 'required'
    	]);
        Prestasi::create($request->all());
        return true;
    }

    public function update(Request $request, $id)
    {
    	$request->validate([
            'kegiatan' => 'required',
            'prestasi' => 'required'
        ]);
        Prestasi::where('id', $id)->update([
            'kegiatan' => $request->kegiatan,
            'prestasi' => $request->prestasi,
            'tahun' => $request->tahun,
        ]);
        return json_encode($request->kegiatan);
    }

    public function destroy($id)
    {
        Prestasi::destroy($id);
        return true;
    }


}
