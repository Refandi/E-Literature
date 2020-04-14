<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Buku;
use App\JenisBuku;
use App\Penerbit;
use App\Pengarang;
use App\TahunTerbit;

class KategoriController extends Controller
{
    public function index()
    {
        $jenis_buku = JenisBuku::all();
        $pengarang = Pengarang::all();
        $penerbit = Penerbit::all();
        $tahun_terbit = TahunTerbit::all();
        return view('welcome', compact('jenis_buku', 'pengarang', 'penerbit', 'tahun_terbit'));
    }
 
    public function create()
    {
        //
    }
 
    public function store(Request $request)
    {

    }
 
    public function show($id)
    {
        //
    }
 
    public function edit($id)
    {

    }
 
    public function update(Request $request, $id)
    {
        //
    }
 
    public function destroy($id)
    {

    }

    public function datatable_welcome()
    {
        $data = Buku::all();
        return Datatables::of($data)
            ->addColumn('action', function($data) {
                $button = '<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-info btn-sm btn-ubah-buku" data-toggle="tooltip"><i class="far fa-edit"></i></a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->id.'" class="btn btn-danger btn-sm btn-hapus-buku"><i class="far fa-trash-alt"></i></button>';     
                return $button;
            })

            ->addColumn('jenis_buku', function($data) {
                return $data->jenis_buku['jenis_buku'];
            })

            ->addColumn('pengarang', function($data) {
                return $data->pengarang['pengarang'];
            })

            ->addColumn('penerbit', function($data) {
                return $data->penerbit['penerbit'];
            })

            ->addColumn('tahun_terbit', function($data) {
                return $data->tahun_terbit['tahun_terbit'];
            })

            ->addIndexColumn()->make(true);
        
    }

}
