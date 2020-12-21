<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

use Redirect;
use Session;

class CategoryController extends Controller
{
    public function index() {
        $category = Category::get();
        $data = array(
            'category' => $category, 
        );
        return view('admin.category.index', $data);
    }

    public function create() {
        return view('admin.category.create');
    }

    public function store(Request $request) {
        $rules = [
            'name'      => 'required',
            'status'    => 'required',
        ];
        $messages = [
            'name.required'     => 'Nama Kategori tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect('admin/category/create')->withErrors($validator);
        }

        $category = new \App\Models\Category;
        $category->name = $request->input('name');
        $category->status = $request->input('status');
        $category->save();
        
        Session::flash('message', 'Kategori berhasil ditambahkan');
        return redirect('admin/category');
    }

    public function edit($id) {
        $category = Category::find($id);
        $data = array(
            'category' => $category
        );
        return view('admin.category.edit', $data);
    }

    public function update(Request $request, $id) {
        $rules = [
            'name'      => 'required',
            'status'    => 'required',
        ];
        $messages = [
            'name.required'     => 'Nama Kategori tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect('admin/category/'.$id.'/edit')->withErrors($validator);
        }

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->status = $request->input('status');
        $category->save();
        
        Session::flash('message', 'Kategori berhasil diubah');
        return redirect('admin/category');
    }

    public function show($id) {
        $category = Category::find($id);
        $data = array(
            'category' => $category,
        );
        
        return view('admin.category.show', $data);
    }

    public function destroy($id) {
        $category = Category::find($id);
        $category->delete();

        Session::flash('message', 'Data berhasil di hapus');
        return redirect('admin/category');
    }
}
