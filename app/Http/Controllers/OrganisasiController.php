<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organisasi;
use App\Theme;

class OrganisasiController extends Controller
{

    public function index()
    {
        return view('admin.organisasi',['tema' => Theme::find(1), 'title' => 'Organisasi']);
    }


    // RestController
    public function all($id)
    {
        $data = Organisasi::all();
        $hasil = [];
        foreach ($data as $row) {
            if ($row->periode == $id) {
                $hasil[] = $row;
            }
        }
        return $hasil;
    }

    public function show($id)
    {
        $hasil = Organisasi::find($id);
        return json_encode($hasil);
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'name' => 'required',
            'title' => 'required',
            'photo1' => 'image|max:2048'
    	]);
        if ($request->file('photo1')) {
            $photo1 = $request->file('photo1')->store('organisasi');
        } else {
            $photo1 = null;
        }
        Organisasi::create([
            'id' => $request->id,
            'name' => $request->name,
            'title' => $request->title,
            'photo1' => $photo1,
            'pid' => $request->pid,
            'tags' => $request->tags,
            'periode' => $request->periode
        ]);
        return ['status' => 'ok'];
    }

    public function update(Request $request, $id)
    {
        $organisasi = Organisasi::find($id);
        if ($request->file('photo1')) {
            \Storage::delete($organisasi->photo1);
            $photo1 = $request->file('photo1')->store('organisasi');
        } else {
            $photo1 = $organisasi->photo1;
        }
    	$request->validate([
            'name' => 'required',
            'title' => 'required',
            'photo1' => 'image|max:2048'
        ]);
        Organisasi::where('id', $id)->update([
            'name' => $request->name,
            'title' => $request->title,
            'photo1' => $photo1,
            'pid' => $request->pid,
            'tags' => $request->tags,
            'periode' => $request->periode
        ]);
        return ['status' => 'ok'];
    }

    public function destroy($id)
    {
        $organisasi = Organisasi::find($id);
        \Storage::delete($organisasi->photo1);
        Organisasi::destroy($id);
        return ['status' => 'ok'];
    }


}
