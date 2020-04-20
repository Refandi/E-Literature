<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Collective\Html\HtmlServiceProvider;

use App\User;

class UserController extends Controller
{
 
    public function index()
    {
        return view('User.index');
    }
 
    public function create()
    {

    }
 
    public function store(Request $request)
    {
        $id = $request->id;
        if($request->password != ''){
            $pass = bcrypt($request->password);
    
            $post = User::updateOrCreate(['id' => $id],
            ['name' => $request->name,
            'email' => $request->email,
            'password' => $pass,
            'role' => $request->role
            ]);
        }
        else{
            $post = User::updateOrCreate(['id' => $id],
            ['name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
            ]);
        }
        return response()->json($post);
    }

    public function ubah_profil(Request $request)
    {
        $id = $request->id;
        if($request->password != ''){
            $pass = bcrypt($request->password);
    
            $post = User::updateOrCreate(['id' => $id],
            ['name' => $request->name,
            'email' => $request->email,
            'password' => $pass,
            ]);
        }
        else{
            $post = User::updateOrCreate(['id' => $id],
            ['name' => $request->name,
            'email' => $request->email,
            ]);
        }
        return response()->json($post);
    }
 
    public function show($id)
    {
        //
    }
 
    public function edit($id)
    {
        $where = array('id' => $id);
        $post = User::where($where)->first();
        return response()->json($post);
    }

    public function update(Request $request, $id)
    {

    }
 
    public function destroy($id)
    {
        $post = User::where('id',$id)->delete();
        return response()->json($post);
    }

    public function datatable()
    {
        $data = User::where('role', 'User')->get();
        return Datatables::of($data)
        ->addColumn('action', function($data) {
            $button = '<a href="javascript:void(0)" data-id="'.$data->id.'" class="edit btn btn-info btn-sm btn-ubah-user" data-toggle="tooltip"><i class="far fa-edit"></i></a>';
            $button .= '&nbsp;&nbsp;';
            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm btn-hapus-user"><i class="far fa-trash-alt"></i></button>';     
            return $button;

        })
            ->addIndexColumn()->make(true);
        
    }

}
