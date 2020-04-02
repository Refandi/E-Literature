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
        //
    }
 
    public function create()
    {
        $model = new User();
        return view('User.form', compact('model'));
    }
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

    }
 
    public function show($id)
    {
        //
    }
 
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
 
    public function destroy($id)
    {
        //
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
