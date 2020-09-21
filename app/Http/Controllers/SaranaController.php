<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sarana;
use App\Theme;
use Illuminate\Support\Facades\Validator;

class SaranaController extends Controller
{

    public function index()
    {
        return view('admin.sarana',['tema' => Theme::find(1), 'title' => 'Sarana']);
    }


    // RestController
    public function all()
    {
        $data = Sarana::all();
        return $data;
    }

    public function show($id)
    {
        return Sarana::find($id);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'sarana' => 'required',
            'foto' => 'image|max:2048'
        ]);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }

        if ($request->file('foto')) {
            $foto = $request->file('foto')->store('sarana');
        } else {
            $foto = null;
        }
        Sarana::create([
            'sarana' => $request->sarana,
            'keterangan' => $request->keterangan,
            'foto' => $foto
        ]);
        return true;
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'sarana' => 'required',
            'foto' => 'image|max:2048'
        ]);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }

    	$sarana = Sarana::find($id);
        if ($request->file('foto')) {
            \Storage::delete($sarana->foto);
            $foto = $request->file('foto')->store('sarana');
        } else {
            $foto = $sarana->foto;
        }
        Sarana::where('id', $id)->update([
            'sarana' => $request->sarana,
            'keterangan' => $request->keterangan,
            'foto' => $foto
        ]);
        return true;
    }

    public function destroy($id)
    {
        $sarana = Sarana::find($id);
        \Storage::delete($sarana->foto);
        Sarana::destroy($id);
        return true;
    }

    public function search($s){
        return Sarana::where('sarana','like','%'.$s.'%')->get();
    }

}
