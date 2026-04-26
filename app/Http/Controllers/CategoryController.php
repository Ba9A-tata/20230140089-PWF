<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     */
    public function index()
    {
        // Mengambil kategori beserta jumlah produk terkait
        $categories = Category::withCount('products')->get();
        return view('category.index', compact('categories'));
    }

    /**
     * Menampilkan Form Tambah Category
     */
    public function create()
    {

        return view('category.create');
    }

    /**
     * Menyimpan Data Kategori ke Database
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:category,name',
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }
}