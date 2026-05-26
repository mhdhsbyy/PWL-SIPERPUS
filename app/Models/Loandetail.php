<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loandetail extends Model
{
    protected $table = 'loan_details';
    protected $fillable = [
        'loan_id',
        'book_id',
        'is_return',
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class, 'loan_id', 'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'loan_id', 'id');
    }

    public function return()
    {
        return $this->hasOne(Returns::class, 'loan_detail_id', 'id');
    }

    public function getStatusAttribute()
    {
        return $this->loan->return_at
            ? 'Dikembalikan'
            : 'Dipinjam';
    }

    public function getStatusColorAttribute()
    {
        return $this->loan->return_at
            ? 'text-green-600'
            : 'text-red-600';
    }
}
