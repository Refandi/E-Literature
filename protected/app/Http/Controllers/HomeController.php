<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\JenisBuku;
use App\Penerbit;
use App\Pengarang;
use App\TahunTerbit;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index()
    {
        $jenis_buku = JenisBuku::all();
        $pengarang = Pengarang::all();
        $penerbit = Penerbit::all();
        $tahun_terbit = TahunTerbit::all();
        return view('home', compact('jenis_buku', 'pengarang', 'penerbit', 'tahun_terbit'));
    }
}
