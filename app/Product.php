<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'purchase_price', 'sales_price', 'picture'
    ];

    public function getPurchasePriceAttribute($value)
    { 
      	return number_format($value, 0);
    }

    public function getSalesPriceAttribute($value)
    { 
      	return number_format($value, 0);
    }
}
