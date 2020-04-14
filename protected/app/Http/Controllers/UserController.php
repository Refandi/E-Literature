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
        $input = $request->all();
        User::updateOrCreate($input);
        return response()->json($input);
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
        $data = User::findOrFail($id);
        $input = $request->all();
        $data->update($input);
        return response()->json($input);
    }
 
    public function destroy($id)
    {
        $post = User::where('id',$id)->delete();
        return response()->json($post);
    }

    public function datatable()
    {
        $data = User::all();
        return Datatables::of($data)
            ->addColumn('action', function($data) {
                return view('datatable.action', [
                    'edit_url' => route('user.edit', $data->id),
                    'del_url'  => route('user.destroy', $data->id),
                ]);

            })
            ->addIndexColumn()->make(true);
        
    }

}
