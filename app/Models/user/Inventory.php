<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_id',
        'serial',
        'model',
        'issue',
        'rma_id',
        'price',
        'attachment',
        'reason_id',
        'status',
        'added_by',
    ];
}
