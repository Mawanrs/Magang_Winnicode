<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.halamanutama');
    }

    public function jadwal()
    {
        $jadwal = [
        ['team_name' => 'Tim A', 'opponent' => 'Tim B', 'date' => '2025-06-01'],
        ['team_name' => 'Tim C', 'opponent' => 'Tim D', 'date' => '2025-06-02'],
    ];
        return view('frontend.jadwalpertandingan', compact('jadwal'));
    }

    public function pembalap()
    {
        $pembalap = [
        ['name' => 'Pembalap A', 'team' => 'Tim A'],
        ['name' => 'Pembalap B', 'team' => 'Tim B'],
    ];
        return view('frontend.pembalap_dan_tim', compact('pembalap'));
    }

    public function berita()
    {
        $berita = [
        ['title' => 'Berita 1', 'content' => 'Konten berita 1'],
        ['title' => 'Berita 2', 'content' => 'Konten berita 2'],
    ];
        return view('frontend.berita', compact('berita'));
    }

    public function detail_berita()
    {
        $detail = [
        'title' => 'Detail Berita',
        'content' => 'Konten detail berita',
    ];
        return view('frontend.detail_berita', compact('detail'));
    }

    public function hasil_dan_klasemen()
    {
        $hasil_dan_klasemen = [
        ['team_name' => 'Tim A', 'score' => 10],
        ['team_name' => 'Tim B', 'score' => 8],
    ];
        return view('frontend.hasil_dan_klasemen', compact('hasil_dan_klasemen'));
    }

    public function infomasi_tiket()
    {
        $info_harga_tiket = [
        'price' => 100000,
        'location' => 'Jakarta',
        'date' => '2025-06-01',
    ];
        return view('frontend.informasi_harga_tiket', compact('info_harga_tiket'));
    }
}
