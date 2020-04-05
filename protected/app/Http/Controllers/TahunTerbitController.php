<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\TahunTerbit;

class TahunTerbitController extends Controller
{
 
    public function index()
    {
        //
    }
 
    public function create()
    {
        //
    }
 
    public function store(Request $request)
    {
        $id = $request->id;
        $post   =   TahunTerbit::updateOrCreate(['id' => $id],
        ['tahun_terbit' => $request->tahun_terbit,]); 

        return response()->json($post);
    }
 
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $post = TahunTerbit::where($where)->first();
        return response()->json($post);
    }
 
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $post = TahunTerbit::where('id',$id)->delete();
        return response()->json($post);
    }

    public function datatable()
    {
        $data = TahunTerbit::all();
        return Datatables::of($data)
            ->addColumn('action', function($data) {
                $button = '<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-info btn-sm btn-tahun_terbit-edit" data-toggle="tooltip"><i class="far fa-edit"></i></a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->id.'" class="btn btn-danger btn-sm btn-tahun_terbit-hapus"><i class="far fa-trash-alt"></i></button>';     
                return $button;

            })
            ->addIndexColumn()->make(true);
        
    }
}
