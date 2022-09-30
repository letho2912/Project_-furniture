<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'address',
        'phone',
        'created_at',
        'note',
        'total',
        'status'
    ];
    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id')
            ->withDefault(['name' => '']);
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
}
