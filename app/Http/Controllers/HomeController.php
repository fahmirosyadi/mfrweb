<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Alumni;
use App\Kegiatan;
use App\Prestasi;
use App\Sarana;
use App\Berita;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $alumni = count(Alumni::all());
        $kegiatan = count(Kegiatan::all());
        $prestasi = count(Prestasi::all());
        $sarana = count(Sarana::all());
        $berita = count(Berita::all());
        $user = count(User::all());
        return view('admin.index',['tema' => Theme::find(1), 'title' => '','alumni' => $alumni,'program' => $kegiatan,'prestasi' => $prestasi,'sarana' => $sarana,'berita' => $berita,'user' => $user]);
    }
}
