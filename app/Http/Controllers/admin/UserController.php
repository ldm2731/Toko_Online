<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Illuminate\Support\Facades\Auth;

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
        ];

        return view('admin/pages/user', $data);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credential)) {
            if (Auth::user()->role_id == 'admin') {
                return redirect()
                    ->route('admin.dashboard')
                    ->with(['succes' => 'login sukses']);
            }else{
                return redirect()
                    ->route('front.home');
            }
        }

        return redirect()
            ->back()
            ->with(['error' => 'login gagal']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('front.home');
    }

    public function datatable()
    {
        return DataTables::of(User::all())
            ->addColumn('action', function (User $user) {
                return '
                <a href="' . route('admin.user.edit', $user->id) . '" class="btn btn-sm btn-warning">Edit</a>
                <a href="' . route('admin.user.destroy', $user->id) . '" class="btn btn-sm btn-danger">Delete</a>
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
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'alamat' => 'required',
            'no_tlpn' => 'required|numeric',
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
        $data = [
            'action' => route('admin.user.update', $id),
            'data' => User::find($id)
        ];

        return view('admin/pages/user', $data);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no_tlpn' => 'required|numeric',
            'role_id' => 'required',
        ]);

        $email_check = User::where('id', '!=', $id)->where('email', $request->email)->first();
        $username_check = User::where('id', '!=', $id)->where('username', $request->username)->first();

        // jika email yang diedit itu milik orang lain
        if ($email_check) {
            return redirect()->back()->with(['error' => [
                'email_duplicate' => ['Email already been taken']
            ]])->withInput();
        }

        // jika username yang diedit itu milik orang lain
        if ($username_check) {
            return redirect()->back()->with(['error' => [
                'username_duplicate' => ['Username already been taken']
            ]])->withInput();
        }

        if ($validator->fails()) {
            return redirect()->back()->with(['error' => $validator->getMessageBag()->getMessages()])->withInput();
        } else {
            $data_update = [
                'name',
                'username',
                'email',
                'alamat',
                'no_tlpn',
                'role_id',
            ];

            if ($request->password) {
                $request->merge([
                    'password' => Hash::make($request->password)
                ]);
                $data_update[] = 'password';
            }
            User::where('id', $id)->update($request->only($data_update));
            return redirect()->route('admin.user.index')->with(['success' => 'Data Updated']);
        }
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
