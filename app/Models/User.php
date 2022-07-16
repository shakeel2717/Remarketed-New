<?php

namespace App\Models;

use App\Models\user\Inventory;
use App\Models\user\Order;
use App\Models\user\Refund;
use App\Models\user\Warehouse;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'role',
        'phone',
        'address',
        'country',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function customers()
    {
        return $this->hasMany(User::class)->where('role', 'customer');
    }

    public function suppliers()
    {
        return $this->hasMany(User::class)->where('role', 'supplier');
    }

    public function warehouses()
    {
        return $this->hasMany(Warehouse::class);
    }


    public function rmas()
    {
        return $this->hasMany(Rma::class);
    }


    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function customerInventories()
    {
        return $this->hasMany(Inventory::class, 'customer_id');
    }

    public function refunds()
    {
        return $this->hasMany(Refund::class);
    }

    public function customerRefunds()
    {
        return $this->hasMany(Refund::class, 'customer_id');
    }


    public function orders()
    {
        return $this->hasMany(Order::class);
    }


    public function customerorders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}
