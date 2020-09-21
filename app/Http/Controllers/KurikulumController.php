<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kurikulum;
use App\Theme;
use Illuminate\Support\Facades\Validator;

class KurikulumController extends Controller
{
    public function index()
    {
        return view('admin.kurikulum',['tema' => Theme::find(1), 'title' => 'Kurikulum']);
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
        $validator =  Validator::make($request->all(),[
            'mapel' => 'required',
            'jenis' => 'required',
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }

        Kurikulum::create($request->all());
        return true;
    }

    public function update(Request $request, $id)
    {
    	$validator =  Validator::make($request->all(),[
            'mapel' => 'required',
            'jenis' => 'required',
        ]);

        if($validator->fails()) {
            return $validator->errors()->all();
        }
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

    public function search($jenis,$s){
        return Kurikulum::where('mapel','like','%'.$s.'%')->where('jenis',$jenis)->get();
    }
}
