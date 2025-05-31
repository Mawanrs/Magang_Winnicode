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
    return view('frontend.halamanutama', compact('headline'));
    
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
    // variabel lain (misal: $news, $schedules) juga bisa ditambah
    return view('frontend.halamanutama', compact('videos'));
    }

    // Jadwal pertandingan
     public function schedule()
{
    $schedules = []; // kosong jika tidak ada data
    return view('frontend.halamanutama', compact('schedules'));
}
}