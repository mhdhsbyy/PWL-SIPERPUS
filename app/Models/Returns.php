<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Returns extends Model
{
    protected $table = 'returns';
    protected $fillable = [
        'loan_detail_id',
        'charge',
        'amount',
    ];

    public function loandetail(){
        $this->belongsTo(Loandetail::class, 'loan_detail_id', 'id');
    }
}
