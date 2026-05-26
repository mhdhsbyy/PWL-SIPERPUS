<?php

namespace App\Http\Controllers;

use App\Models\Loandetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LoanDetailController extends Controller
{
    public function index()
    {
        $loanDetails = LoanDetail::with(['loan.user', 'book'])->get();

        return view('loandetails.index', compact('loanDetails'));
    }

    // public function show($id)
    // {
    //     $bookshelf = Bookshelf::with('books')->findOrFail($id);
    //     return view('books.show', compact('bookshelf'));
    // }

    // create
    public function create(){
        $data['loandetails'] = Loandetail::pluck('id', 'id');
        return view('loandetails.create', $data);
    }

    // tambah
    public function store(Request $request){
        $validated = $request->validate([
            'loan_id' => 'required',
            'book_ud' => 'required',
            'is_return' => 'required',
        ]);

        Loandetail::create($validated);

        $notification = array(
            'message' => "Data detail peminjaman berhasil ditambahkan!",
            'alert-type' => "success",
        );

        if($request->save == true){
            return redirect()->route('loandetails')->with($notification);
        } else {
            return redirect()->route('loandetails.create')->with($notification);
        }
    }

    // // edit
    // public function edit(string $id){
    //     $data['book'] = Book::find($id);
    //     $data['bookshelves'] = Bookshelf::pluck('name', 'id');
    //     return view('books.edit', $data);
    // }

    // update
    public function update(Request $request, string $id){

        $book = Loandetail::find($id);

        $validated = $request->validate([
            'loan_id' => 'required',
            'book_ud' => 'required',
            'is_return' => 'required',
        ]);

        Loandetail::where('id', $id)->update($validated);

        $notification = array(
            'message' => "Data detail peminjaman berhasil diperbarui!",
            'alert-type' => "success",
        );

            return redirect()->route('books')->with($notification);
    }

    // public function destroy(string $id){
    //     $book = Book::find($id);

    //     Storage::delete('public/cover_buku/'.$book->cover);

    //     $book->delete();

    //     $notification = array(
    //         'message' => "Data buku berhasil dihapus!",
    //         'alert-type' => "success",
    //     );

    //         return redirect()->route('books')->with($notification);
    // }
}
