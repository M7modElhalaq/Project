<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirebaseController extends Controller
{
    public function index() {
        $role = Firebase::get('/roles',['print'=> 'pretty']);

        dd($role);
    }
}
