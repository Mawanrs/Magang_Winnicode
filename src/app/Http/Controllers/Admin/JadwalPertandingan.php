<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalPertandinganController extends Controller
{
    public function index()
    {
        $headline = News::latest()->first();
        $news = News::latest()->take(6)->get();
        $videos = News::whereNotNull('video_url')->latest()->take(3)->get();
        $schedules = Schedule::latest()->take(3)->get();

        return view('home', compact('headline', 'news', 'videos', 'schedules'));
    }
}