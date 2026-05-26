<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ambil semua loan dan book
        $loans = DB::table('loans')->pluck('id');
        $books = DB::table('books')->pluck('id');

        if ($loans->isEmpty() || $books->isEmpty()) {
            return;
        }

        $data = [];

        // bikin dummy loan details
        foreach ($loans as $loanId) {

            // setiap loan punya 1–3 buku
            $randomBooks = $books->random(min(rand(1, 3), $books->count()));

            foreach ($randomBooks as $bookId) {
                $data[] = [
                    'loan_id' => $loanId,
                    'book_id' => $bookId,
                    'is_return' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('loan_details')->insert($data);
    }
}
