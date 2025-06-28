<?php

namespace App\Http\Controllers;

use App\Models\JadwalPertandingan;
use App\Models\News;
use App\Models\HasilKlasemen;
use App\Models\Pembalap;
use App\Models\Video;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $headline = News::latest()->first();
        $news = News::latest()->take(4)->get();
        $schedules = JadwalPertandingan::orderBy('tanggal_dan_waktu', 'asc')->get();
        $klasemen = HasilKlasemen::orderBy('position', 'asc')->take(3)->get();
        $videos = Video::latest()->take(4)->get();
        return view('frontend.halamanutama', compact('headline', 'news', 'schedules', 'klasemen', 'videos'));
    }

    public function berita()
    {
        $news = \App\Models\News::latest()->paginate(8); // atau sesuai kebutuhan
        $headline = \App\Models\News::latest()->first();
        return view('frontend.berita', compact('news', 'headline'));
    }

    public function berita_detail($slug)
    {
        $berita = \App\Models\News::where('slug', $slug)->firstOrFail();
        $otherNews = \App\Models\News::where('id', '!=', $berita->id)->latest()->take(5)->get();
        return view('frontend.detail_berita', compact('berita', 'otherNews'));
    }

    public function video()
    {
        $videos = \App\Models\Video::latest()->paginate(12);
        return view('frontend.video', compact('videos'));
    }

    public function videoDetail($slug)
    {
        $video = \App\Models\Video::where('slug', $slug)->firstOrFail();
        $otherVideos = \App\Models\Video::where('id', '!=', $video->id)->latest()->take(4)->get();
        return view('frontend.video_detail', compact('video', 'otherVideos'));
    }

    public function schedule()
    {
        $schedules = JadwalPertandingan::orderBy('tanggal_dan_waktu', 'asc')->get();
        $headline = News::latest()->first();
        return view('frontend.jadwalpertandingan', compact('schedules', 'headline'));
    }

    public function hasil_dan_klasemen()
    {
        $klasemen = HasilKlasemen::orderBy('position', 'asc')->get();
        return view('frontend.hasil_dan_klasemen', compact('klasemen'));
    }

    public function pembalap()
    {
        $pembalap = Pembalap::all();
        return view('frontend.pembalap_dan_tim', compact('pembalap'));
    }
}
