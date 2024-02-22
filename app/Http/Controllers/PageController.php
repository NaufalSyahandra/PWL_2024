<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return 'Selamat Datang';
    }

    public function about()
    {
        return 'NIM     : 2241720189' . '<br>' . 'Nama    : Mohammad Naufal Syahandra';
    }

    public function articles($id)
    {
        return "Halaman Artikel dengan Id: $id";
    }
}
