<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Data_baju;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'action' => route('admin.product.store'),
            'category' => Category::all()
        ];

        return view('admin/pages/product', $data);
    }

    public function datatable()
    {
        return DataTables::of(Data_baju::with('category')->get())
        ->addColumn('action', function(Data_baju $product) {
            return '
                <a href="'.route('admin.product.edit', $product->id).'" class="btn btn-sm btn-warning">Edit</a>
                <a href="'.route('admin.product.destroy', $product->id).'" class="btn btn-sm btn-danger">Delete</a>
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
            'category_id' => 'required',
            'nama_baju' => 'required',
            'harga_baju' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'required|mimes:jpg,jpeg,png|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['error' => $validator->getMessageBag()->getMessages()])->withInput();
        } else {

            $request->request->add([
                'gambar' => $request->file('image')->store('assets/images/product')
            ]);
            Data_baju::create($request->all());
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
            'action' => route('admin.product.update', $id),
            'data' => Data_baju::find($id),
            'category' => Category::all()
        ];

        return view('admin/pages/product', $data);
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
            'category_id' => 'required',
            'nama_baju' => 'required',
            'harga_baju' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $data = Data_baju::find($id);

        if ($validator->fails()) {
            return redirect()->back()->with(['error' => $validator->getMessageBag()->getMessages()])->withInput();
        } else {
            $data_update = [
                'category_id',
                'nama_baju',
                'harga_baju',
                'stock',
            ];

            if ($request->image) {

                $validator_image = Validator::make($request->all(), [
                    'image' => 'required|mimes:jpg,jpeg,png|max:2000',
                ]);

                if ($validator_image->fails()) {
                    return redirect()->back()->with(['error' => $validator_image->getMessageBag()->getMessages()])->withInput();
                }

                $request->merge([
                    'gambar' => $request->file('image')->store('assets/images/product')
                ]);
                $data_update[] = 'gambar';

                Storage::delete($data->gambar);
            }
            Data_baju::where('id', $id)->update($request->only($data_update));
            return redirect()->route('admin.product.index')->with(['success' => 'Data Updated']);
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
        $data = Data_baju::find($id);

        Storage::delete($data->gambar);

        Data_baju::where('id', $id)->delete();
        return redirect()->back()->with(['success' => 'Data Deleted']);
    }
}
