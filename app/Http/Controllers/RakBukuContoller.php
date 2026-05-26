<?php

namespace App\Http\Controllers;

use App\Models\Bookshelf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RakBukuContoller extends Controller
{
    public function index()
    {
        $bookshelves = Bookshelf::all();

        return view('bookshelves.index', compact('bookshelves'));
    }

    // public function show($id)
    // {
    //     $bookshelf = Bookshelf::with('books')->findOrFail($id);
    //     return view('books.show', compact('bookshelf'));
    // }

    // create
    public function create()
    {
        $data['bookshelves'] = Bookshelf::pluck('name', 'id');
        return view('bookshelves.create', $data);
    }

    // tambah
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|max:10',
            'name' => 'required|max:150',
        ]);

        Bookshelf::create($validated);

        $notification = array(
            'message' => "Data rak buku berhasil ditambahkan!",
            'alert-type' => "success",
        );

        if ($request->save == true) {
            return redirect()->route('bookshelves')->with($notification);
        } else {
            return redirect()->route('bookshelves.create')->with($notification);
        }
    }

    // edit
    public function edit(string $id){
        $data['bookshelf'] = Bookshelf::find($id);
        return view('bookshelves.edit', $data);
    }

    // update
    public function update(Request $request, string $id){

        $bookhelf = Bookshelf::find($id);

        $validated = $request->validate([
            'code' => 'required|max:10',
            'name' => 'required|max:150',
        ]);
        Bookshelf::where('id', $id)->update($validated);

        $notification = array(
            'message' => "Data rak buku berhasil diperbarui!",
            'alert-type' => "success",
        );

            return redirect()->route('bookshelves')->with($notification);
    }

    public function destroy(string $id){
        $bookshelf = Bookshelf::find($id);

        $bookshelf->delete();

        $notification = array(
            'message' => "Data rak buku berhasil dihapus!",
            'alert-type' => "success",
        );

            return redirect()->route('bookshelves')->with($notification);
    }
}
