<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use File;
use App\Buku;
use App\JenisBuku;
use App\Pengarang;
use App\Penerbit;
use App\TahunTerbit;

class BukuController extends Controller
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
        return view('Buku.index', compact('jenis_buku', 'pengarang', 'penerbit', 'tahun_terbit'));
    }
 
    public function create()
    {

    }
 
    public function store(Request $request)
    {
            $id = $request->id;

            //ini dijalankan jika file path berisi data
            if($request->hasFile('path')){
                $file = $request->file('path');
                $nama = $file->getClientOriginalName();
                $path = $file->store('buku');

                $data = Buku::findOrFail($id);
                Storage::delete($data->path);
                $post = Buku::updateOrCreate(['id' => $id], //id akan digunakan jika melakukan proses ubah data
                ['judul_buku' => $request->judul_buku,
                'jenis_buku_id' => $request->jenis_buku_id,
                'pengarang_id' => $request->pengarang_id,
                'penerbit_id' => $request->penerbit_id,
                'tahun_terbit_id' => $request->tahun_terbit_id,
                'sinopsis' => $request->sinopsis,
                'path' => $path,
                'nama' => $nama]
            ); 
            }
            //ini dijalankan jika file path tidak diisi
            else{
                $post = Buku::updateOrCreate(['id' => $id], //id akan digunakan jika melakukan proses ubah data
                    ['judul_buku' => $request->judul_buku,
                    'jenis_buku_id' => $request->jenis_buku_id,
                    'pengarang_id' => $request->pengarang_id,
                    'penerbit_id' => $request->penerbit_id,
                    'tahun_terbit_id' => $request->tahun_terbit_id,
                    'sinopsis' => $request->sinopsis]
                ); 
            }

            return response()->json($post);
            
    }

    // public function store(Request $request)
    // {
    //         $file = $request->file('path');
    //         $nama = $file->getClientOriginalName();
    //         $path = $file->store('buku');
    //         $input = Buku::create([
    //             'judul_buku' => $request->judul_buku,
    //             'jenis_buku_id' => $request->jenis_buku_id,
    //             'pengarang_id' => $request->pengarang_id,
    //             'penerbit_id' => $request->penerbit_id,
    //             'tahun_terbit_id' => $request->tahun_terbit_id,
    //             'sinopsis' => $request->sinopsis,
    //             'path' => $path,
    //             'nama' => $nama
    //         ]);
    //         return response()->json($input);
            
    // }
 
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $post = Buku::where($where)->first();
        return response()->json($post);
    }
 
    public function update(Request $request, $id)
    {

    }
 
    public function destroy($id)
    {
        $post = Buku::where('id',$id)->delete();
        return response()->json($post);
    }

    public function download_pdf($id){
        $file = Buku::find($id);
        return response()->download('upload/'.$file->path, $file->nama);
    }

    public function datatable()
    {
        
        $data = Buku::all();
        return Datatables::of($data)
            ->addColumn('action', function($data) {
                if(Auth::user()->role == 'Admin'){
                    $button = '<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-info btn-sm btn-ubah-buku" data-toggle="tooltip"><i class="far fa-edit"></i></a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="btn btn-danger btn-sm btn-hapus-buku"><i class="far fa-trash-alt"></i></button>';  
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="/E-Literature/download-file/'.$data->id.'" class="btn btn-info btn-sm" data-toggle="tooltip"><i class="fas fa-download"></i></a>';                     
                    return $button;
                }
                elseif(Auth::user()->role == 'User'){
                    $button = '<a href="/E-Literature/download-file/'.$data->id.'" class="btn btn-info btn-sm" data-toggle="tooltip"><i class="fas fa-download"></i> Unduh</a>';
                    return $button;
                }
                
                
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
