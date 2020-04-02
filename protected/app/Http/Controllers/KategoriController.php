<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Kategori;

class KategoriController extends Controller
{
 
    public function index()
    {
        return view('Kategori.index');
    }
 
    public function create()
    {
        //
    }
 
    public function store(Request $request)
    {
        $id = $request->id;
        
        $post   =   Kategori::updateOrCreate(['id' => $id],
                    [
                        'nama' => $request->nama,
                    ]); 

        return response()->json($post);
    }
 
    public function show($id)
    {
        //
    }
 
    public function edit($id)
    {
        $where = array('id' => $id);
        $post = Kategori::where($where)->first();
        return response()->json($post);
    }
 
    public function update(Request $request, $id)
    {
        //
    }
 
    public function destroy($id)
    {
        $post = Kategori::where('id',$id)->delete();
     
        return response()->json($post);
    }

    public function datatable()
    {
        $data = Kategori::all();
        return Datatables::of($data)
            ->addColumn('action', function($data) {
                $button = '<a href="javascript:void(0)" data-id="'.$data->id.'" class="edit btn btn-info btn-sm btn-edit" data-toggle="tooltip"><i class="far fa-edit"></i> Ubah</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Hapus</button>';     
                return $button;

            })
            ->addIndexColumn()->make(true);
        
    }

}
