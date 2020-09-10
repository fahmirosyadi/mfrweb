<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Kegiatan;
use App\Alumni;
use App\Profil;
use App\Sarana;
use App\Pengasuh;
use App\Berita;
use Mail;

class PagesController extends Controller
{
    public function index() {
		$tema = Theme::find(1);
    	$wajib = [];
    	$ekstra = [];
    	$berita = Berita::orderByDesc('created_at')->limit(2)->get();
    	$data = Kegiatan::all();
    	foreach ($data as $row) {
    		if ($row->jenis == 'wajib') {
    			$wajib[] = $row;
    		} else {
    			$ekstra[] = $row;
    		}
    	}
    	return view('user2.index',['tema' => $tema, 'wajib' => $wajib, 'ekstra' => $ekstra,'alumni' => Alumni::all(),'profil' => Profil::find(1),'sarana' => Sarana::all(),'pengasuh' => Pengasuh::find(1),'berita' => $berita, 'title' => 'Home']);
    }
    public function organisasi() {
    	$title = "Organisasi";
    	$tema = Theme::find(1);
    	return view('user2.organisasi',['title' => $title, 'tema' => $tema]);
    }
    public function alumni() {
    	$tema = Theme::find(1);
    	return view('user.alumni',['tema' => $tema, 'data' => Theme::find(1)]);
    }

    public function program() {
    	$title = "Program";
    	$popular = Berita::orderByDesc('views')->limit(4)->get();
    	$new = Berita::orderByDesc('created_at')->limit(4)->get();
    	return view('user2.program',['title' => $title,'tema' => Theme::find(1),'popular' => $popular, 'new' => $new,'program' => Kegiatan::where('jenis','wajib')->get()]);
    }

    public function ekstra() {
    	$title = "Ekstrakurikuler";
    	$popular = Berita::orderByDesc('views')->limit(4)->get();
    	$new = Berita::orderByDesc('created_at')->limit(4)->get();
    	return view('user2.ekstra',['title' => $title,'tema' => Theme::find(1),'popular' => $popular, 'new' => $new,'ekstra' => Kegiatan::where('jenis','ekstra')->get()]);
    }

    public function prestasi() {
    	$title = "Prestasi";
    	$tema = Theme::find(1);
    	$popular = Berita::orderByDesc('views')->limit(4)->get();
    	$new = Berita::orderByDesc('created_at')->limit(4)->get();
    	return view('user2.prestasi',['title' => $title, 'tema' => $tema,'popular' => $popular, 'new' => $new]);
    }

    public function sejarah() {
    	$title = "Sejarah";
    	$tema = Theme::find(1);
    	$profil = Profil::find(1);
    	return view('user2.sejarah',['title' => $title, 'tema' => $tema,'profil' => $profil]);
    }

    public function pengasuh() {
    	$title = "Pengasuh";
    	$tema = Theme::find(1);
    	$pengasuh = Pengasuh::find(1);
    	return view('user2.pengasuh',['title' => $title, 'tema' => $tema,'pengasuh' => $pengasuh]);
    }

    public function berita() {
    	$title = "Berita";
    	$tema = Theme::find(1);
    	$popular = Berita::orderByDesc('views')->limit(4)->get();
    	$berita = Berita::orderByDesc('created_at')->limit(4)->get();
    	return view('user2.blog',['title' => $title, 'berita' => $berita,'tema' => $tema,'popular' => $popular]);
    }

    public function beritaDetails($id) {
    	$title = "Detail Berita";
    	$tema = Theme::find(1);
    	$detailBerita = Berita::find($id);
    	$popular = Berita::orderByDesc('views')->limit(4)->get();
    	$new = Berita::orderByDesc('created_at')->limit(4)->get();
    	Berita::where('id', $id)->update([
        	'views' => $detailBerita->views + 1
        ]);
        $detailBerita = Berita::find($id);
    	return view('user2.detail-berita',['title' => $title,'popular' => $popular, 'new' => $new,'detailBerita' => $detailBerita,'tema' => $tema]);
    }

    public function contact() {
    	$title = "Contact";
    	return view('user2.contact',['tema' => Theme::find(1),'title' => $title]);
    }

    public function contactProcess(Request $request) {
    	Mail::send('user2.contact_process',[
			'from' => $request->email,
			'name' => $request->name,
			'subject' => $request->subject,
			'cmessage' => $request->message
    	], function($mail) use($request) {
    		$mail->from(env('MAIL_FROM_ADDRESS'),$request->name);
    		$mail->to('m.fahmi.r26@gmail.com')->subject($request->subject);
    	});
    	return 'Berhasil!!!';
    }

    public function daftar() {
    	$title = "Pendaftaran";
    	$popular = Berita::orderByDesc('views')->limit(4)->get();
    	$new = Berita::orderByDesc('created_at')->limit(4)->get();
    	return view('user2.daftar',['title' => $title,'tema' => Theme::find(1),'popular' => $popular, 'new' => $new]);
    }

    public function sarana() {
    	$title = "Sarana";
    	$popular = Berita::orderByDesc('views')->limit(4)->get();
    	$new = Berita::orderByDesc('created_at')->limit(4)->get();
    	return view('user2.sarana',['title' => $title,'tema' => Theme::find(1),'popular' => $popular, 'new' => $new,'sarana' => Sarana::all()]);
    }

    public function detailSarana($id) {
    	$title = "Detail Sarana";
    	$tema = Theme::find(1);
    	$detailSarana = Sarana::find($id);
    	$popular = Berita::orderByDesc('views')->limit(4)->get();
    	$new = Berita::orderByDesc('created_at')->limit(4)->get();
    	return view('user2.detail-sarana',['title' => $title,'popular' => $popular, 'new' => $new,'detailSarana' => $detailSarana,'tema' => $tema]);
    }

    public function kurikulum() {
    	$title = "Kurikulum";
    	$popular = Berita::orderByDesc('views')->limit(4)->get();
    	$new = Berita::orderByDesc('created_at')->limit(4)->get();
    	return view('user2.kurikulum',['title' => $title,'tema' => Theme::find(1),'popular' => $popular, 'new' => $new]);
    }

}
