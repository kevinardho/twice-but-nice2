<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{   
    // Menampilkan daftar kategori
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.category', ['categories' => $categories]);
    }

    // Menampilkan form untuk menambahkan kategori baru
    public function create()
    {
        return view('admin.add-category');
    }

    // Menambahkan kategori baru    
    public function store(Request $request)
    {
        $request->validate([
            "category_name" => "required|string|unique:categories,category_name"
        ]);
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->save();
        return redirect('/admin/category/add')->with('success', 'Kategori berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit kategori
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.edit-category', ['category' => $category]);
    }

    // Mengupdate kategori produk
    public function update(Request $request, $id)
    {
        $request->validate([
            "category_name" => "required|string|unique:categories,category_name"
        ]);
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->save();
        return redirect('/admin/category')->with('success', 'Kategori berhasil diubah');
    }
}
