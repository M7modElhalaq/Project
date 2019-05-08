<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'image', 'price', 'quantity', 'discount','availability', 'description', 'short_description', 'category_id', 'sub_category_id'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function subCategory() {
        return $this->belongsTo('App\SubCategory');
    }
}
