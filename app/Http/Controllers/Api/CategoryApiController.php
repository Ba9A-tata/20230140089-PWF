<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Daftar kategori berhasil diambil',
            'data' => CategoryApiController::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        $category = Category::create($validated);
        return response()->json(['message' => 'Kategori berhasil dibuat', 'data' => $category], 210);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        if (!$category) return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        return response()->json(['data' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        if (!$category) return response()->json(['message' => 'Kategori tidak ditemukan'], 404);

        $validated = $request->validate(['name' => 'required|string|max:255']);
        $category->update($validated);
        return response()->json(['message' => 'Kategori berhasil diupdate', 'data' => $category]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if (!$category) return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        
        $category->delete();
        return response()->json(['message' => 'Kategori berhasil dihapus']);
    }
}
