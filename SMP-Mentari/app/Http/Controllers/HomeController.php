<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $perPage = (int) Setting::get('home_kegiatan_per_page', 6);
        $kegiatans = Kegiatan::latest()->paginate($perPage);

        return view('welcome', compact('kegiatans'));
    }
}