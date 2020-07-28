<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['id', 'user_id', 'is_send', 'product_id', 'name', 'price', 'row_id', 'qty', 'weight'];
}
