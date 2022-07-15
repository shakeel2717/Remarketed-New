<?php

namespace App\Models;

use App\Models\user\Warehouse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rma extends Model
{
    use HasFactory;


    protected $fillable = [
        'customer_id',
        'supplier_id',
        'warehouse_id',
        'status',
        'type',
    ];


    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function supplier()
    {
        return $this->belongsTo(User::class, 'supplier_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
