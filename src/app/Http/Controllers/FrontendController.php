<?php

namespace App\Http\Controllers;
use App\Models\JadwalPertandingan;
use App\Models\News;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
   public function home()
    {

    $headline = News::latest()->first();
    $schedules = JadwalPertandingan::orderBy('tanggal_dan_waktu', 'asc')->get();
    return view('frontend.halamanutama', compact('headline', 'schedules'));
    
    }

    // Data berita terbaru dummy
    public function berita()
    {
        $news = [
            [
                'title' => 'Berita 1',
                'content' => 'Konten berita 1',
                'slug' => 'berita-1',
            ],
            [
                'title' => 'Berita 2',
                'content' => 'Konten berita 2',
                'slug' => 'berita-2',
            ],
        ];

        return view('frontend.berita', compact('news'));
    }

    // Data video dummy
     public function video()
    {
        $videos = [
        (object)[
            'title' => 'Video 1',
            'video_url' => 'https://www.youtube.com/embed/xxxx1',
            'slug' => 'video-1',
        ],
        (object)[
            'title' => 'Video 2',
            'video_url' => 'https://www.youtube.com/embed/xxxx2',
            'slug' => 'video-2',
        ],
    ];
    $headline = News::latest()->first();
    $schedules = JadwalPertandingan::orderBy('tanggal_dan_waktu', 'asc')->get();

    return view('frontend.halamanutama', compact('videos', 'headline', 'schedules'));
    }

    // Jadwal pertandingan
     public function schedule()
    {
        $schedules = JadwalPertandingan::orderBy('tanggal_dan_waktu', 'asc')->get();
        $headline = News::latest()->first(); // TAMBAHKAN INI!
        return view('frontend.jadwalpertandingan', compact('schedules', 'headline'));
    }
}