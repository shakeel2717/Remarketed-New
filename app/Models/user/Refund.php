<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'rma_id',
        'customer_id',
        'amount',
        'method',
        'txid',
        'attachment',
        'note',
    ];
}
