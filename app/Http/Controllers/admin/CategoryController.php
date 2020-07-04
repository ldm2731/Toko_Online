<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'action' => route('admin.category.store'),
        ];

        return view('admin/pages/category', $data);
    }

    public function datatable()
    {
        return DataTables::of(Category::all())
        ->addColumn('action', function(Category $category) {
            return '
                <a href="'.route('admin.category.edit', $category->id).'" class="btn btn-sm btn-warning">Edit</a>
                <a href="'.route('admin.category.destroy', $category->id).'" class="btn btn-sm btn-danger">Delete</a>
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
            'name' => 'required|unique:categories',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['error' => $validator->getMessageBag()->getMessages()])->withInput();
        } else {
            $request->merge([
                'password' => Hash::make($request->password)
            ]);
            Category::create($request->all());
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
            'action' => route('admin.category.update', $id),
            'data' => Category::find($id)
        ];

        return view('admin/pages/category', $data);
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
        ]);

        $categoryname_check = Category::where('id', '!=', $id)->where('name', $request->name)->first();

        // jika categoryname yang diedit itu milik orang lain
        if ($categoryname_check) {
            return redirect()->back()->with(['error' => [
                'categoryname_duplicate' => ['Category name already been taken']
            ]])->withInput();
        }

        if ($validator->fails()) {
            return redirect()->back()->with(['error' => $validator->getMessageBag()->getMessages()])->withInput();
        } else {
            $data_update = [
                'name',
            ];

            if ($request->password) {
                $request->merge([
                    'password' => Hash::make($request->password)
                ]);
                $data_update[] = Hash::make($request->password);
            }
            Category::where('id', $id)->update($request->only($data_update));
            return redirect()->route('admin.category.index')->with(['success' => 'Data Updated']);
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
        Category::where('id', $id)->delete();
        return redirect()->back()->with(['success' => 'Data Deleted']);
    }
}
