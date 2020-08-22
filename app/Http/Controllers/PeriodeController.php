<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Periode;

class PeriodeController extends Controller
{

    public function index()
    {
        return view('admin.periode');
    }


    // RestController
    public function all()
    {
        $data = Periode::all();
        return $data;
    }

    public function show(Periode $periode)
    {
        return $periode;
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'periode' => 'required'
    	]);
        Periode::create($request->all());
        return ['status' => 'ok'];
    }

    public function update(Request $request, Periode $periode)
    {
    	$request->validate([
    		'periode' => 'required'
    	]);
        Periode::where('id', $periode->id)->update([
        	'periode' => $request->periode
        ]);
    }

    public function destroy(Periode $periode)
    {
        Periode::destroy($periode->id);
        return ['status' => 'ok'];
    }


}
