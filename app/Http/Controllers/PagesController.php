<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Kegiatan;

class PagesController extends Controller
{
    public function index() {
		$tema = Theme::find(1);
    	$wajib = [];
    	$ekstra = [];
    	$data = Kegiatan::all();
    	foreach ($data as $row) {
    		if ($row->jenis == 'wajib') {
    			$wajib[] = $row;
    		} else {
    			$ekstra[] = $row;
    		}
    	}
    	return view('user.index',['tema' => $tema, 'wajib' => $wajib, 'ekstra' => $ekstra]);
    }
    public function organisasi() {
    	$tema = Theme::find(1);
    	return view('user.organisasi',['tema' => $tema]);
    }
    public function alumni() {
    	$tema = Theme::find(1);
    	return view('user.alumni',['tema' => $tema, 'data' => Theme::find(1)]);
    }

    public function kegiatan() {
    	
    }

    public function prestasi() {
    	$tema = Theme::find(1);
    	$hasil = Theme::find(1);
    	return view('user.prestasi',['theme' => $hasil,'tema' => $tema]);
    }

}
