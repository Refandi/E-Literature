<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Penerbit;

class PenerbitController extends Controller
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
        $post   =   Penerbit::updateOrCreate(['id' => $id],
        ['penerbit' => $request->penerbit,]); 

        return response()->json($post);
    }
 
    public function show($id)
    {
        //
    }
 
    public function edit($id)
    {
        $where = array('id' => $id);
        $post = Penerbit::where($where)->first();
        return response()->json($post);
    }
 
    public function update(Request $request, $id)
    {
        //
    }
 
    public function destroy($id)
    {
        $post = Penerbit::where('id',$id)->delete();
        return response()->json($post);
    }

    public function datatable()
    {
        $data = Penerbit::all();
        return Datatables::of($data)
            ->addColumn('action', function($data) {
                $button = '<a href="javascript:void(0)" data-id="'.$data->id.'" class="btn btn-info btn-sm btn-penerbit-edit" data-toggle="tooltip"><i class="far fa-edit"></i></a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->id.'" class="btn btn-danger btn-sm btn-penerbit-hapus"><i class="far fa-trash-alt"></i></button>';     
                return $button;

            })
            ->addIndexColumn()->make(true);
        
    }
}
