<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Theme;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function index()
    {
        return view('admin.contact',['tema' => Theme::find(1), 'title' => 'Contact']);
    }


    // RestController
    public function all()
    {
        $data = Contact::all();
        return $data;
    }

    public function show($id)
    {
        $hasil = Contact::find($id);
        return $hasil;
    }

    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(),[
            'nama' => 'required',
    		'contact' => 'required'
    	]);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        Contact::create($request->all());
        return true;
    }

    public function update(Request $request, $id)
    {
    	$validator = Validator::make($request->all(),[
            'nama' => 'required',
            'contact' => 'required'
        ]);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        Contact::where('id', $id)->update([
            'nama' => $request->nama,
            'contact' => $request->contact,
        ]);
        return true;
    }

    public function destroy($id)
    {
        Contact::destroy($id);
        return true;
    }

    public function search($s){
        return Contact::where('nama','like','%'.$s.'%')->orWhere('contact','like','%'.$s.'%')->get();
    }


}
