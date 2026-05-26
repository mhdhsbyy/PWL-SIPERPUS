<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    // public function show($id)
    // {
    //     $bookshelf = Bookshelf::with('books')->findOrFail($id);
    //     return view('books.show', compact('bookshelf'));
    // }

    // create
    public function create()
    {
        $data['categories'] = Category::pluck('category', 'id');
        return view('categories.create', $data);
    }

    // tambah
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|max:150',
        ]);

        Category::create($validated);

        $notification = array(
            'message' => "Data kategori berhasil ditambahkan!",
            'alert-type' => "success",
        );

        if ($request->save == true) {
            return redirect()->route('categories')->with($notification);
        } else {
            return redirect()->route('categories.create')->with($notification);
        }
    }

    // edit
    public function edit(string $id){
        $data['category'] = Category::find($id);
        return view('categories.edit', $data);
    }

    // update
    public function update(Request $request, string $id){

        $category = Category::find($id);

        $validated = $request->validate([
            'category' => 'required|max:150',
        ]);
        Category::where('id', $id)->update($validated);

        $notification = array(
            'message' => "Data kategori berhasil diperbarui!",
            'alert-type' => "success",
        );

            return redirect()->route('categories')->with($notification);
    }

    public function destroy(string $id){
        $category = Category::find($id);

        $category->delete();

        $notification = array(
            'message' => "Data kategori berhasil dihapus!",
            'alert-type' => "success",
        );

            return redirect()->route('categories')->with($notification);
    }
}
