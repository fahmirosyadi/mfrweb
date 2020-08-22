<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sarana;

class SaranaController extends Controller
{

    public function index()
    {
        return view('admin.sarana');
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
    	$request->validate([
            'sarana' => 'required',
            'foto' => 'image|max:2048'
        ]);
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
    	$sarana = Sarana::find($id);
        if ($request->file('foto')) {
            \Storage::delete($sarana->foto);
            $foto = $request->file('foto')->store('sarana');
        } else {
            $foto = $sarana->foto;
        }
        $request->validate([
            'sarana' => 'required',
            'foto' => 'image|max:2048'
        ]);
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


}
