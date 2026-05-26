<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoanDetailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RakBukuContoller;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function(){
    Route::get('/books', [BukuController::class, 'index'])->name('books');
    Route::get('/books/create', [BukuController::class, 'create'])->name('books.create');
    Route::post('/books', [BukuController::class, 'store'])->name('books.store');
    Route::get('/books/{id}/edit', [BukuController::class, 'edit'])->name('books.edit');
    Route::match(['put', 'patch'], '/books/{id}', [BukuController::class, 'update'])->name('books.update');
    Route::delete('/books/{id}', [BukuController::class, 'destroy'])->name('books.destroy');
    Route::get('/books/print', [BukuController::class, 'print'])->name('books.print');
    Route::get('/books/export', [BukuController::class, 'export'])->name('books.export');
    Route::post('/books/import', [BukuController::class, 'import'])->name('books.import');
});

Route::middleware('auth')->group(function(){
    Route::get('/bookshelves', [RakBukuContoller::class, 'index'])->name('bookshelves');
    Route::get('/bookshelves/create', [RakBukuContoller::class, 'create'])->name('bookshelves.create');
    Route::post('/bookshelves', [RakBukuContoller::class, 'store'])->name('bookshelves.store');
    Route::get('/bookshelves/{id}/edit', [RakBukuContoller::class, 'edit'])->name('bookshelves.edit');
    Route::match(['put', 'patch'], '/bookshelves/{id}', [RakBukuContoller::class, 'update'])->name('bookshelves.update');
    Route::delete('/bookshelves/{id}', [RakBukuContoller::class, 'destroy'])->name('bookshelves.destroy');
});

Route::middleware('auth')->group(function(){
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::match(['put', 'patch'], '/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

Route::middleware('auth')->group(function(){
    Route::get('/loans', [LoanController::class, 'index'])->name('loans');
    Route::get('/loans/create', [LoanController::class, 'create'])->name('loans.create');
    Route::post('/loans', [LoanController::class, 'store'])->name('loans.store');
    Route::get('/loans/{id}/edit', [LoanController::class, 'edit'])->name('loans.edit');
    Route::match(['put', 'patch'], '/loans/{id}', [LoanController::class, 'update'])->name('loans.update');
    Route::delete('/loans/{id}', [LoanController::class, 'destroy'])->name('loans.destroy');
});

Route::middleware('auth')->group(function(){
    Route::get('/loandetails', [LoanDetailController::class, 'index'])->name('loandetails');
    Route::get('/loandetails/create', [LoanDetailController::class, 'create'])->name('loandetails.create');
    Route::post('/loandetails', [LoanDetailController::class, 'store'])->name('loandetails.store');
    Route::get('/loandetails/{id}/edit', [LoanDetailController::class, 'edit'])->name('loandetails.edit');
    Route::match(['put', 'patch'], '/loandetails/{id}', [LoanDetailController::class, 'update'])->name('loandetails.update');
    Route::delete('/loandetails/{id}', [LoanDetailController::class, 'destroy'])->name('loandetails.destroy');
});


require __DIR__.'/auth.php';
