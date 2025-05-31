<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembalap;
class PembalapController extends Controller
{

    public function pembalap()
    {
    // Ambil semua data pembalap dari database
    $pembalaps = Pembalap::all();
    // Kirim ke view
    return view('frontend.pembalap_dan_tim', compact('pembalaps'));
    }
}
