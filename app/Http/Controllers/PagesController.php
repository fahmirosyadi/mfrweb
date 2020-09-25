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
use App\Contact;
use App\Gallery;
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
    	return view('user2.index',['tema' => $tema, 'wajib' => $wajib, 'ekstra' => $ekstra,'alumni' => Alumni::all(),'profil' => Profil::find(1),'sarana' => Sarana::all(),'pengasuh' => Pengasuh::find(1),'berita' => $berita, 'title' => 'Home','contact' => Contact::all()]);
    }
    public function organisasi() {
    	$title = "Organisasi";
    	$tema = Theme::find(1);
    	return view('user2.organisasi',['title' => $title, 'tema' => $tema,'contact' => Contact::all(),'profil' => Profil::find(1)]);
    }
    public function alumni() {
    	$tema = Theme::find(1);
    	return view('user.alumni',['tema' => $tema, 'data' => Theme::find(1),'contact' => Contact::all(),'profil' => Profil::find(1)]);
    }

    public function detailAlumni($id) {
        $title = "Detail Alumni";
        $tema = Theme::find(1);
        $alumni = Alumni::find($id);
        return view('user2.alumni-detail',['title' => $title, 'tema' => $tema,'alumni' => $alumni,'contact' => Contact::all(),'profil' => Profil::find(1)]);
    }

    public function program() {
    	$title = "Program";
    	$popular = Berita::orderByDesc('views')->limit(4)->get();
    	$new = Berita::orderByDesc('created_at')->limit(4)->get();
    	return view('user2.program',['title' => $title,'tema' => Theme::find(1),'popular' => $popular, 'new' => $new,'program' => Kegiatan::where('jenis','wajib')->get(),'contact' => Contact::all(),'profil' => Profil::find(1)]);
    }

    public function detailProgram($id) {
        $title = "Detail Program";
        $tema = Theme::find(1);
        $detailProgram = Kegiatan::find($id);
        $popular = Berita::orderByDesc('views')->limit(4)->get();
        $new = Berita::orderByDesc('created_at')->limit(4)->get();
        return view('user2.detail-program',['title' => $title,'popular' => $popular, 'new' => $new,'detailProgram' => $detailProgram,'tema' => $tema,'profil' => Profil::find(1),'contact' => Contact::all()]);
    }

    public function ekstra() {
    	$title = "Ekstrakurikuler";
    	$popular = Berita::orderByDesc('views')->limit(4)->get();
    	$new = Berita::orderByDesc('created_at')->limit(4)->get();
    	return view('user2.ekstra',['title' => $title,'tema' => Theme::find(1),'popular' => $popular, 'new' => $new,'ekstra' => Kegiatan::where('jenis','ekstra')->get(),'contact' => Contact::all(),'profil' => Profil::find(1)]);
    }

    public function detailEkstra($id) {
        $title = "Detail Ekstrakurikuler";
        $tema = Theme::find(1);
        $detailEkstra = Kegiatan::find($id);
        $popular = Berita::orderByDesc('views')->limit(4)->get();
        $new = Berita::orderByDesc('created_at')->limit(4)->get();
        return view('user2.detail-ekstra',['title' => $title,'popular' => $popular, 'new' => $new,'detailEkstra' => $detailEkstra,'tema' => $tema,'profil' => Profil::find(1),'contact' => Contact::all()]);
    }

    public function prestasi() {
    	$title = "Prestasi";
    	$tema = Theme::find(1);
    	$popular = Berita::orderByDesc('views')->limit(4)->get();
    	$new = Berita::orderByDesc('created_at')->limit(4)->get();
    	return view('user2.prestasi',['title' => $title, 'tema' => $tema,'popular' => $popular, 'new' => $new,'contact' => Contact::all(),'profil' => Profil::find(1)]);
    }

    public function galleryPrestasi($id) {
        $title = "Gallery Prestasi";
        $popular = Berita::orderByDesc('views')->limit(4)->get();
        $new = Berita::orderByDesc('created_at')->limit(4)->get();
        return view('user2.prestasi-gallery',['title' => $title,'tema' => Theme::find(1),'popular' => $popular, 'new' => $new,'listFoto' => Gallery::where('prestasi_id',$id)->get(),'profil' => Profil::find(1),'contact' => Contact::all(),'prestasiId' => $id]);
    }

    public function sejarah() {
    	$title = "Sejarah";
    	$tema = Theme::find(1);
    	$profil = Profil::find(1);
    	return view('user2.sejarah',['title' => $title, 'tema' => $tema,'profil' => $profil,'contact' => Contact::all()]);
    }

    public function pengasuh() {
    	$title = "Pengasuh";
    	$tema = Theme::find(1);
    	$pengasuh = Pengasuh::find(1);
    	return view('user2.pengasuh',['title' => $title, 'tema' => $tema,'pengasuh' => $pengasuh,'contact' => Contact::all(),'profil' => Profil::find(1)]);
    }

    public function berita() {
    	$title = "Berita";
    	$tema = Theme::find(1);
    	$popular = Berita::orderByDesc('views')->limit(4)->get();
    	$berita = Berita::orderByDesc('created_at')->limit(4)->get();
        $count = Berita::all();
        $count = count($count) / 3;
    	return view('user2.blog',['title' => $title, 'berita' => $berita,'tema' => $tema,'popular' => $popular,'count' => $count,'contact' => Contact::all(),'profil' => Profil::find(1)]);
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
    	return view('user2.detail-berita',['title' => $title,'popular' => $popular, 'new' => $new,'detailBerita' => $detailBerita,'tema' => $tema,'contact' => Contact::all(),'profil' => Profil::find(1)]);
    }

    public function contact() {
    	$title = "Contact";
    	return view('user2.contact',['tema' => Theme::find(1),'title' => $title,'contact' => Contact::all(),'profil' => Profil::find(1)]);
    }

    public function contactProcess(Request $request) {
        return env('APP_NAME');
        $request->validate([
            'name' => 'required',
            'email' => 'email',
            'subject' => 'required'
        ]);

    	Mail::send('user2.contact_process',[
			'from' => $request->email,
			'name' => $request->name,
			'subject' => $request->subject,
			'cmessage' => $request->message
    	], function($mail) use($request) {
    		$mail->from(env('MAIL_FROM_ADDRESS'),$request->name);
    		$mail->to('rosyadif26@gmail.com')->subject($request->subject);
    	});
    	return redirect('/contact')->with(['success' => 'Berhasil terkirim']);
    }

    public function daftar() {
    	$title = "Pendaftaran";
    	$popular = Berita::orderByDesc('views')->limit(4)->get();
    	$new = Berita::orderByDesc('created_at')->limit(4)->get();
    	return view('user2.daftar',['title' => $title,'tema' => Theme::find(1),'popular' => $popular, 'new' => $new,'profil' => Profil::find(1),'contact' => Contact::all()]);
    }

    public function sarana() {
    	$title = "Sarana";
    	$popular = Berita::orderByDesc('views')->limit(4)->get();
    	$new = Berita::orderByDesc('created_at')->limit(4)->get();
    	return view('user2.sarana',['title' => $title,'tema' => Theme::find(1),'popular' => $popular, 'new' => $new,'sarana' => Sarana::all(),'profil' => Profil::find(1),'contact' => Contact::all()]);
    }

    public function detailSarana($id) {
    	$title = "Detail Sarana";
    	$tema = Theme::find(1);
    	$detailSarana = Sarana::find($id);
    	$popular = Berita::orderByDesc('views')->limit(4)->get();
    	$new = Berita::orderByDesc('created_at')->limit(4)->get();
    	return view('user2.detail-sarana',['title' => $title,'popular' => $popular, 'new' => $new,'detailSarana' => $detailSarana,'tema' => $tema,'profil' => Profil::find(1),'contact' => Contact::all()]);
    }

    public function kurikulum() {
    	$title = "Kurikulum";
    	$popular = Berita::orderByDesc('views')->limit(4)->get();
    	$new = Berita::orderByDesc('created_at')->limit(4)->get();
    	return view('user2.kurikulum',['title' => $title,'tema' => Theme::find(1),'popular' => $popular, 'new' => $new,'profil' => Profil::find(1),'contact' => Contact::all()]);
    }

}
