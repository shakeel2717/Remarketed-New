<?php

namespace App\Models\user;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'name',
        'location',
        'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
