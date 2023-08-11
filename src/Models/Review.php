<?php

namespace VarenykyReview\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'rating',
        'description',
        'active',
    ];
}