<?php

namespace App\Http\Controllers;

use App\Models\PesanTamu;
use Illuminate\Http\Request;

class PesanTamuController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string',
        ]);

        PesanTamu::create($validated);

        return back()->with('success', 'Pesan Anda berhasil terkirim!');
    }
}