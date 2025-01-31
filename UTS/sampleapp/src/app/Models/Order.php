<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'product_name',
        'quantity',
        'total_price',
    ];

    /**
     * Relationship: An order belongs to a customer.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
