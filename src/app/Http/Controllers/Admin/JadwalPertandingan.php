<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalPertandinganController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        return view('jadwal_pertandingan.index');
    }
}