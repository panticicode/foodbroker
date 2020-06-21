<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['id', 'user_id', 'product_id', 'row_id', 'qty', 'weight'];
}
