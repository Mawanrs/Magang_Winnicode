<?php

namespace App\Http\Controllers;

use App\Models\JadwalPertandingan;
use App\Models\News;
use App\Models\HasilKlasemen;
use App\Models\Pembalap;
use App\Models\Video;
use App\Models\Komentar;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $headline = News::latest()->first();
        $news = News::latest()->take(4)->get();
        $schedules = JadwalPertandingan::orderBy('tanggal_dan_waktu', 'asc')->get();
        $klasemen = HasilKlasemen::orderBy('position', 'asc')->take(3)->get();
        $klasemen_motogp = HasilKlasemen::where('kategori', 'MOTOGP')->orderBy('position')->get();
        $klasemen_moto2  = HasilKlasemen::where('kategori', 'MOTO2')->orderBy('position')->get();
        $klasemen_moto3  = HasilKlasemen::where('kategori', 'MOTO3')->orderBy('position')->get();
        $klasemen_motoe  = HasilKlasemen::where('kategori', 'MOTOE')->orderBy('position')->get();
        $videos = Video::latest()->take(4)->get();

        return view('frontend.halamanutama', compact(
            'headline', 'news', 'schedules', 'klasemen', 'videos',
            'klasemen_motogp', 'klasemen_moto2', 'klasemen_moto3', 'klasemen_motoe'
        ));
    }

    // DAFTAR BERITA (LIST)
    public function berita()
    {
        $news = News::latest()->paginate(8);
        $headline = News::latest()->first();
        return view('frontend.berita', compact('news', 'headline'));
    }

    // DETAIL BERITA
    public function berita_detail($slug)
    {
        $berita = News::with('komentars')->where('slug', $slug)->firstOrFail();
        $otherNews = News::where('id', '!=', $berita->id)->latest()->take(5)->get();
        return view('frontend.detail_berita', compact('berita', 'otherNews'));
    }

    // STORE KOMENTAR
    public function storeKomentar(Request $request, $slug)
    {
        $berita = News::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'nama'  => 'required|string|max:100',
            'email' => 'nullable|email',
            'isi'   => 'required|string|max:2000',
        ]);

        Komentar::create([
            'news_id' => $berita->id,
            'nama'    => $validated['nama'],
            'email'   => $validated['email'] ?? null,
            'isi'     => $validated['isi'],
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil dikirim!');
    }

    // VIDEO PAGE
    public function video()
    {
        $videos = Video::latest()->paginate(12);
        return view('frontend.video', compact('videos'));
    }

    // VIDEO DETAIL PAGE
    public function videoDetail($slug)
    {
        $video = Video::where('slug', $slug)->firstOrFail();
        $otherVideos = Video::where('id', '!=', $video->id)->latest()->take(4)->get();
        return view('frontend.video_detail', compact('video', 'otherVideos'));
    }

    // JADWAL PAGE
    public function schedule()
    {
        $schedules = JadwalPertandingan::orderBy('tanggal_dan_waktu', 'asc')->get();
        $headline = News::latest()->first();
        return view('frontend.jadwalpertandingan', compact('schedules', 'headline'));
    }

    // Klasemen lengkap (all kategori)
    public function hasil_dan_klasemen()
    {
        $klasemen = HasilKlasemen::orderBy('position', 'asc')->get();
        return view('frontend.hasil_dan_klasemen', compact('klasemen'));
    }

    // Jika butuh page khusus klasemen dengan tab per kategori
    public function klasemen()
    {
        return view('frontend.klasemen', [
            'klasemen_motogp' => HasilKlasemen::where('kategori', 'MOTOGP')->orderBy('position')->get(),
            'klasemen_moto2'  => HasilKlasemen::where('kategori', 'MOTO2')->orderBy('position')->get(),
            'klasemen_moto3'  => HasilKlasemen::where('kategori', 'MOTO3')->orderBy('position')->get(),
            'klasemen_motoe'  => HasilKlasemen::where('kategori', 'MOTOE')->orderBy('position')->get(),
        ]);
    }

    // PEMBALAP PAGE
    public function pembalap()
    {
        $pembalap = Pembalap::all();
        return view('frontend.pembalap_dan_tim', compact('pembalap'));
    }
}
