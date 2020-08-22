<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kurikulum;

class KurikulumController extends Controller
{
    public function index()
    {
        return view('admin.kurikulum');
    }


    // RestController
    public function all($jenis)
    {
        $data = Kurikulum::all();
        $hasil = [];
        foreach ($data as $row) {
        	if ($row->jenis == $jenis) {
        		$hasil[] = $row;
        	}
        }
        return $hasil;
    }

    public function show($id)
    {
        $hasil = Kurikulum::find($id);
        return $hasil;
    }

    public function store(Request $request)
    {
    	$request->validate([
            'mapel' => 'required',
    		'jenis' => 'required'
    	]);
        Kurikulum::create($request->all());
        return true;
    }

    public function update(Request $request, $id)
    {
    	$request->validate([
            'mapel' => 'required',
            'jenis' => 'required'
        ]);
        Kurikulum::where('id', $id)->update([
            'mapel' => $request->mapel,
            'jenis' => $request->jenis
        ]);
        return true;
    }

    public function destroy($id)
    {
        Kurikulum::destroy($id);
        return true;
    }
}
