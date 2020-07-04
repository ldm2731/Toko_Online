<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'action' => route('admin.user.store'),
            'method' => 'post',
        ];

        return view('admin/pages/user', $data);
    }

    public function datatable()
    {
        return DataTables::of(User::all())
        ->addColumn('action', function(User $user) {
            return '
                <a href="'.route('admin.user.edit', $user->id).'" class="btn btn-sm btn-warning">Edit</a>
                <a href="'.route('admin.user.destroy', $user->id).'" class="btn btn-sm btn-danger">Delete</a>
            ';
        })
        ->escapeColumns([])
        ->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'no_tlpn' => 'required',
            'role_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['error' => $validator->getMessageBag()->getMessages()])->withInput();
        } else {
            $request->merge([
                'password' => Hash::make($request->password)
            ]);
            User::create($request->all());
            return redirect()->back()->with(['success' => 'Data Saved']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with(['success' => 'Data Deleted']);
    }
}
