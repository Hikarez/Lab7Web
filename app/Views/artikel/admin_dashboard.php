<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class Admin extends BaseController
{
    public function dashboard()
    {
        $artikelModel = new ArtikelModel();
        $kategoriModel = new KategoriModel();

        $data = [
            'title' => 'Dashboard Admin',
            'totalArtikel' => $artikelModel->countAll(),
            'totalKategori' => $kategoriModel->countAll(),
            'totalAdmin' => 1, // Jika belum ada user management, isi manual
            'artikelTerbaru' => $artikelModel->orderBy('created_at', 'DESC')->findAll(5),
        ];

        return view('dashboard', $data);
    }
}
