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

    public function index()
    {
        $kategoris = Kategori::all();
        // kirim ke view blade
        return view('frontend.berita.index', compact('kategoris'));

        $headline = (object) [
            'title' => 'Judul Headline Dummy',
            'image' => 'dummy.jpg',
            'content' => 'Isi berita dummy...',
            'slug' => 'slug-dummy'
        ];

        $headline_thumbs = [
            (object)[
                'title' => 'Berita 1',
                'image' => 'dummy1.jpg',
                'created_at' => now()->subHours(1)
            ],
            (object)[
                'title' => 'Berita 2',
                'image' => 'dummy2.jpg',
                'created_at' => now()->subHours(2)
            ],
        ];

        return view('frontend.halamanutama', compact('headline', 'headline_thumbs'));
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
    $headline_thumbs = Headline::orderBy('created_at', 'desc')->take(3)->get();
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