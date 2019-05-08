<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'image'];

    public function sub_categories(){
        return $this->hasMany('App\SubCategory');
    }

    public function products() {
        return $this->hasMany('App\Product');
    }
}
