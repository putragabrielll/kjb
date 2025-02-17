<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Artikel;
use App\Models\Playlist;
use App\Models\Materi;
use App\Models\Iklan;

class AboutController extends Controller
{
    public function index()
    {
        $kategori = Kategori::latest()->get()->random(5);
        $playlist = Playlist::latest()->get()->where('is_active', 1)->random(5);
        $iklan_a = Iklan::where('is_active', 1)->where('id', 3)->get();
        return view('front.about.index', compact(
            'kategori',
            'playlist',
            'iklan_a'
        ));
    }
}
