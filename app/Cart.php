<?php

namespace App\Http\Controllers;

class Cart
{
    public $items = null;
    public $totalPrice;

    public function __construct($oldCart) {
        if($oldCart) {
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }
}
