<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::all();

        foreach ($loans as $loan) {
            $loan->loan_at_format = Carbon::parse($loan->loan_at)
                ->translatedFormat('d F Y');

            $loan->return_at_format = Carbon::parse($loan->return_at)
                ->translatedFormat('d F Y');
        }

        return view('loans.index', compact('loans'));
    }

    // public function show($id)
    // {
    //     $bookshelf = Bookshelf::with('books')->findOrFail($id);
    //     return view('books.show', compact('bookshelf'));
    // }

    // create
    public function create()
    {
        $data['loans'] = Loan::pluck('user_npm', 'id');
        return view('loans.create', $data);
    }

    // tambah
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_npm' => 'required|max:10',
            'loan_at' => 'required',
            'return_at' => 'required',
        ]);

        Loan::create($validated);

        $notification = array(
            'message' => "Data peminjaman berhasil ditambahkan!",
            'alert-type' => "success",
        );

        if ($request->save == true) {
            return redirect()->route('loans')->with($notification);
        } else {
            return redirect()->route('loans.create')->with($notification);
        }
    }

    // edit
    public function edit(string $id)
    {
        $data['loan'] = Loan::find($id);
        return view('loans.edit', $data);
    }

    // update
    public function update(Request $request, string $id)
    {

        $loan = Loan::find($id);

        $validated = $request->validate([
            'user_npm' => 'required|max:10',
            'loan_at' => 'required',
            'return_at' => 'required',
        ]);
        Loan::where('id', $id)->update($validated);

        $notification = array(
            'message' => "Data peminjaman berhasil diperbarui!",
            'alert-type' => "success",
        );

        return redirect()->route('loans')->with($notification);
    }

    public function destroy(string $id)
    {
        $loan = Loan::find($id);

        $loan->delete();

        $notification = array(
            'message' => "Data peminjaman berhasil dihapus!",
            'alert-type' => "success",
        );

        return redirect()->route('loans')->with($notification);
    }
}
