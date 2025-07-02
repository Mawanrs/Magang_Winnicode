<?php

namespace App\Http\Controllers;

use App\Models\Cuaca;
use App\Models\News;
use App\Models\Video;
use App\Models\Komentar;
use App\Models\Pembalap;
use App\Models\KlasemenTim;
use App\Models\HasilBalapan;
use App\Models\HasilKlasemen;
use App\Models\JadwalPertandingan;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $headline = News::latest()->first();
        $news = News::latest()->take(4)->get();

        $events = JadwalPertandingan::select(
            'negara as country',
            'nama_pertandingan as race_name',
            'tanggal_dan_waktu as date'
        )->orderBy('tanggal_dan_waktu')->get();

        $events = collect($events)->unique(function ($item) {
            return $item->country . $item->date . $item->race_name;
        });

        $schedules = JadwalPertandingan::orderBy('tanggal_dan_waktu')->get();
        $videos = Video::latest()->take(4)->get();
        $cuaca = Cuaca::latest()->first();
        $klasemen = HasilKlasemen::orderBy('position')->take(3)->get();

        $klasemen_motogp = HasilKlasemen::where('kategori', 'MOTOGP')->orderBy('position')->get();
        $klasemen_moto2  = HasilKlasemen::where('kategori', 'MOTO2')->orderBy('position')->get();
        $klasemen_moto3  = HasilKlasemen::where('kategori', 'MOTO3')->orderBy('position')->get();
        $klasemen_motoe  = HasilKlasemen::where('kategori', 'MOTOE')->orderBy('position')->get();

        $klasemen_tim_motogp = KlasemenTim::where('kategori', 'MOTOGP')->orderBy('posisi')->get();
        $klasemen_tim_moto2  = KlasemenTim::where('kategori', 'MOTO2')->orderBy('posisi')->get();
        $klasemen_tim_moto3  = KlasemenTim::where('kategori', 'MOTO3')->orderBy('posisi')->get();
        $klasemen_tim_motoe  = KlasemenTim::where('kategori', 'MOTOE')->orderBy('posisi')->get();

        return view('frontend.halamanutama', compact(
            'headline', 'news', 'events', 'schedules', 'videos', 'cuaca', 'klasemen',
            'klasemen_motogp', 'klasemen_moto2', 'klasemen_moto3', 'klasemen_motoe',
            'klasemen_tim_motogp', 'klasemen_tim_moto2', 'klasemen_tim_moto3', 'klasemen_tim_motoe'
        ));
    }

    public function berita()
    {
        $news = News::latest()->paginate(8);
        $headline = News::latest()->first();
        return view('frontend.berita', compact('news', 'headline'));
    }

    public function berita_detail($slug)
    {
        $berita = News::with('komentars')->where('slug', $slug)->firstOrFail();
        $otherNews = News::where('id', '!=', $berita->id)->latest()->take(5)->get();
        return view('frontend.detail_berita', compact('berita', 'otherNews'));
    }

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

    public function video()
    {
        $videos = Video::latest()->paginate(12);
        return view('frontend.video', compact('videos'));
    }

    public function videoDetail($slug)
    {
        $video = Video::where('slug', $slug)->firstOrFail();
        $otherVideos = Video::where('id', '!=', $video->id)->latest()->take(4)->get();
        return view('frontend.video_detail', compact('video', 'otherVideos'));
    }

    public function schedule()
    {
        $schedules = JadwalPertandingan::orderBy('tanggal_dan_waktu')->get();
        $nextRace = JadwalPertandingan::where('tanggal_dan_waktu', '>=', now())->orderBy('tanggal_dan_waktu')->first();

        $events = JadwalPertandingan::select(
            'negara as country',
            'nama_pertandingan as race_name',
            'tanggal_dan_waktu as date'
        )->orderBy('tanggal_dan_waktu')->get();

        $events = collect($events)->unique(function ($item) {
            return $item->country . $item->date . $item->race_name;
        });

        $headline = News::latest()->first();

        return view('frontend.jadwalpertandingan', compact('schedules', 'nextRace', 'events', 'headline'));
    }

    public function pembalap()
    {
        $pembalap = Pembalap::all();
        return view('frontend.pembalap_dan_tim', compact('pembalap'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'tanah' => 'required|integer',
            'kelembapan' => 'required|integer',
            'kondisi_lintasan' => 'required|string|max:255',
            'cuaca' => 'required|string|max:255',
            'suhu_udara' => 'required|integer',
        ]);

        Cuaca::create($request->all());

        return redirect()->route('cuaca.index')->with('success', 'Data cuaca berhasil diperbarui!');
    }

    // Menampilkan Hasil Balapan
    public function hasilBalapan(Request $request)
    {
        $kategori = $request->input('kategori', 'MOTOGP');

        $hasilBalapan = HasilBalapan::where([
                ['tahun', 2025],
                ['kategori', $kategori],
                ['grand_prix', 'Netherlands'],
                ['diklasifikasikan', true],
            ])
            ->orderBy('posisi')
            ->get();

        $tidakDiklasifikasikan = HasilBalapan::where([
                ['tahun', 2025],
                ['kategori', $kategori],
                ['grand_prix', 'Netherlands'],
                ['diklasifikasikan', false],
            ])->get();

        $cuaca = Cuaca::latest()->first();

        return view('frontend.hasil_balapan', compact(
            'hasilBalapan',
            'tidakDiklasifikasikan',
            'kategori',
            'cuaca'
        ));
    }

    // Menampilkan Klasemen Tim
    public function hasilKlasemen(Request $request)
    {
        $kategori = $request->input('kategori', 'MOTOGP');

        $klasemenPembalap = HasilKlasemen::where('kategori', $kategori)
            ->orderBy('position')
            ->get();

        $grand_prix_terbaru = HasilBalapan::where('kategori', $kategori)
            ->orderByDesc('id')
            ->value('grand_prix');

        $hasilBalapan = HasilBalapan::where([
                ['kategori', $kategori],
                ['grand_prix', $grand_prix_terbaru],
                ['diklasifikasikan', true],
            ])
            ->orderBy('posisi')
            ->get();

        $tidakDiklasifikasikan = HasilBalapan::where([
                ['kategori', $kategori],
                ['grand_prix', $grand_prix_terbaru],
                ['diklasifikasikan', false],
            ])
            ->get();

        $klasemenTim = KlasemenTim::where('kategori', $kategori)
            ->orderBy('posisi')
            ->get();

        $cuaca = Cuaca::latest()->first();

        return view('frontend.hasil_dan_klasemen', compact(
            'klasemenPembalap',
            'hasilBalapan',
            'klasemenTim',
            'tidakDiklasifikasikan',
            'kategori',
            'cuaca'
        ));
    }

}
